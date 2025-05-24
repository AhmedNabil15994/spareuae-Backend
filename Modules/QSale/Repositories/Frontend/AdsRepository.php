<?php

namespace Modules\QSale\Repositories\Frontend;

use Illuminate\Support\Facades\DB;
use Modules\Core\Packages\Payment\Contract\PaymentInterface;
use Modules\QSale\Concerns\AdsCreateTrait;
use Modules\QSale\Entities\Ads as Model;
use Modules\QSale\Enum\AddationType;
use Modules\QSale\Enum\AdsType;

class AdsRepository
{
    use AdsCreateTrait;

    protected $model;
    protected $payment;

    public function __construct(Model $model, PaymentInterface $payment)
    {
        $this->model = $model;
        $this->payment = $payment;
    }

    public function findById($id, $with = [])
    {
        return $this->model->where("id", $id)->with($with)->firstOrFail();
    }

    public function adsCount()
    {
        return $this->model->count();
    }

    public function findBySlug($slug, $with = [], $withCount = [])
    {
        return $this->model->where("slug", $slug)
            ->orWhere("id", $slug)
            ->with($with)
            ->when(auth()->check(), fn($query) => $query->isFavourit(auth()->id()))
            ->withCount($withCount)
            ->firstOrFail();
    }

    public function listActive($request, $with = ["media"])
    {
        $topQuery = $this->model
            ->allowShow()
        //  ->withIsType()
            ->filterAdType($request)
            ->searchBase($request)
            ->categorySlugFilter($request)
            ->newAttributeFilter($request)
            ->newPriceFilter($request)
            ->sortBasedType(AddationType::NORMAL)
            ->sortFilter($request)
            // ->addressFilter($request)
            ->when($request->country_id, function ($query) use ($request) {
                $query->whereHas("address", function ($query) use ($request) {
                    $query->where("ads_addresses.country_id", $request->country_id);
                });
            })
            ->when(auth()->check(), fn($query) => $query->isFavourit(auth()->id()))
            ->when($request->brand_id, fn($query, $val) => $query->whereBrandId($val))
            ->when($request->year, fn($query, $val) => $query->where('year', $val))
            ->latest()
            ->with($with);
        if(isset($request->sub_category_id) && !empty($request->sub_category_id)){
            $topQuery->where('category_id',$request->sub_category_id);
        }
        if(isset($request->category_id) && !empty($request->category_id) && (!isset($request->sub_category_id) || empty($request->sub_category_id))){
            $topQuery->categoryFilter($request);
        }
        return $topQuery->paginate($request->page_count ?? config("app.page_count", 15));
    }

    public function findByAuthAndId($id, $with = [])
    {
        return $this->model
            ->authTenant()
            ->where("id", $id)
            ->with($with)
            ->firstOrFail();
    }

    public function listAdsMe($request, $with = ["media"])
    {
        return $this->model->authTenant()
            ->with($with)
            ->paginate($request->page_count ?? config("app.page_count", 15));
    }

    public function listAdsRecommend($with = ["media", "addationsModel"], $take = 4)
    {
        return $this->model
            ->allowShow()
        // ->withCount("userFavorites")
        // ->whereIn("id", [7,8,9,10])
            ->sortBasedType(AddationType::NORMAL)
            ->when(auth()->check(), fn($query) => $query->isFavourit(auth()->id()))
            ->with($with)
            ->take($take)
            ->get();
    }

    public function store(&$request)
    {
        if(isset($request['sub_category_id']) && !empty($request['sub_category_id'])){
            $request['category_id'] = $request['sub_category_id'];
            unset($request['sub_category_id']);
        }



        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $user = auth()->user();
            $user->load("office", "currentSubscription.package");
            $data = array_merge($validated, $this->handelDataForAds($user, $request));
            if(isset($request['ad_price']) && !empty($request['ad_price'])){
                $data['ads_price'] = $request['ad_price'];
                $data['total'] = $request['ad_price'];
                unset($data['ad_price']);
            }
            $model = $this->updateOrCreateAds($data, $user);

            if (!in_array($model->type, [AdsType::NORMAL])) {
                $model->handleUserSubscription($user);
            }

            $this->uploadAttach($model, $request, true);
            $this->handleOrUpdateAttribute($model, $request);
            $this->handleAddations($model, $request);
            $this->createAddress($model, $request);

            $model->confirm();
            DB::commit();

            return $model;
        } catch (\Exception$e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateAfterCreate(&$request, &$model)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $model->attributes()->delete();
            $model->address()->delete();
            $model->update($data);
            $this->uploadAttach($model, $request);
            $this->deleteMediaInRequest($model, $request);
            $this->createAddress($model, $request);
            $model->adTypes()->sync($request->ad_types ?? []);
            DB::commit();
            return $model;
        } catch (\Exception$e) {
            DB::rollback();
            throw $e;
        }
    }

//    public function listByCategoryId($request,$categoryId,$with = ["media"]){
//        return $this->model
//            ->allowShow()
//            //  ->withIsType()
//            ->filterAdType($request)
//            ->searchBase($request)
//            ->categorySlugFilter($request)
//            ->newAttributeFilter($request)
//            ->newPriceFilter($request)
//            ->sortBasedType(AddationType::NORMAL)
//            ->sortFilter($request)
//            // ->addressFilter($request)
//            ->where('category_id',$categoryId)
//            ->when($request->country_id, function ($query) use ($request) {
//                $query->whereHas("address", function ($query) use ($request) {
//                    $query->where("ads_addresses.country_id", $request->country_id);
//                });
//            })
//            ->when(auth()->check(), fn($query) => $query->isFavourit(auth()->id()))
//            ->when($request->brand_id, fn($query, $val) => $query->whereBrandId($val))
//            ->when($request->year, fn($query, $val) => $query->where('year', $val))
//            ->latest()
//            ->with($with)
//
//            ->paginate($request->page_count ?? config("app.page_count", 15));
//
//    }
}
