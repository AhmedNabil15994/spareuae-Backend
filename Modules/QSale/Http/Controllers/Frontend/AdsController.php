<?php

namespace Modules\QSale\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\QSale\Enum\AdsStatus;
use Modules\QSale\Http\Requests\Frontend\AdsRequest;
use Modules\QSale\Http\Requests\Frontend\AdsUpdateRequest;
use Modules\QSale\Repositories\Api\AdsRepository as Repo;
use Modules\QSale\Repositories\Frontend\AdsRepository;
use Modules\Attribute\Repositories\Dashboard\AttributeRepository;

class AdsController extends Controller
{
    protected $repo;

    public function __construct(AdsRepository $repo,AttributeRepository $attrs)
    {
        $this->repo = $repo;
        $this->attrs = $attrs;
    }

    public function show(Request $request, $slug)
    {

        $ads = $this->repo->findBySlug(
            $slug,
            [
                "category.ancestors",
                "user" => fn($query) => $query->withCount([
                    "ads" => fn($adsQuery) => $adsQuery->allowShow(),
                ]),
                "addationsModel", "attributes",
            ],
            ['comments']
        );
        $ads->increment("view", 1);
        return view("qsale::frontend.show", compact("ads"));
    }

    public function index(Request $request)
    {
        $ads = $this->repo->listActive($request, ["media", "addationsModel", "attributes"]);
        $attributes = $this->attrs->getAllActiveSearch();
        $allAttributesForRelated = buildRelatedOptions($this->attrs->getAllForRelated());
        $attributes = array_reverse(reset($attributes));
        $category = $request->category_id ? Category::active()->find($request->category_id) : null;
        return view("qsale::frontend.index", compact("ads", "request","attributes","allAttributesForRelated","category"));
    }

    public function saveAds(AdsRequest $request)
    {
        $ads = $this->repo->store($request);

        return redirect()->route("frontend.user.my_ads")
        ->withSuccess(__("qsale::frontend.messages.success_paid_ads")) ;
        // return redirect()->route("frontend.ads.preview_payment", $ads->id);
    }

    public function previewPayment(Request $request, $id)
    {
        $ads = $this->repo->findById($id, ["office", "subscription", "user", "addationsModel"]);
        abort_if($ads->user_id != auth()->id(), "404");
        $payment = $this->repo->paymentHandler($ads);
        $url = $payment ? $this->repo->getUrlPayment($payment, "frontend-order") : "";
        if($url != ""){
            return  redirect()->away($url);
        }else{
            return view("qsale::frontend.preview-payment", compact("ads", "url"));
        }
    }

    public function editMyAd(AdsUpdateRequest $request, $id)
    {
        $ads = $this->repo->findById($id, ["office", "subscription", "user", "addationsModel"]);
        abort_if($ads->user_id != auth()->id(), "404");
        if ($ads->status != AdsStatus::WAIT && !$ads->checkIsPublish()) {
            return back()->withSuccess(__("qsale::api.ads.not_not_allow_edit"));
        }
        $this->repo->updateAfterCreate($request, $ads);
        return redirect()->route("frontend.user.my_ads")->withSuccess(__("user::frontend.edit_ads.edit_successfully"));
    }
}
