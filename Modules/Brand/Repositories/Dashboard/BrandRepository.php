<?php

namespace Modules\Brand\Repositories\Dashboard;

use DB;
use Carbon\Carbon;
use Modules\Brand\Entities\Brand;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class BrandRepository extends CrudRepository
{
    // public function __construct(Brand $brand)
    // {
    //     $this->brand = $brand;
    // }

    // public function getModel($order = 'id', $sort = 'desc')
    // {
    //     return $this->brand;
    // }

    // public function getAll($order = 'id', $sort = 'desc')
    // {
    //     $companies = $this->brand->orderBy($order, $sort)->get();
    //     return $companies;
    // }

    // public function findById($id)
    // {
    //     $brand = $this->brand->find($id);
    //     return $brand;
    // }

    // public function create($request)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $request->merge([
    //             'start_date' => $request->start_date ? Carbon::parse($request->start_date)->toDateTimeString() : null,
    //             'end_date' => $request->end_date ? Carbon::parse($request->end_date)->toDateTimeString() : null,
    //             'order' => $request->order ? $request->order : ($this->brand->all()->count() + 1),
    //             'status' => $request->status ? 1 : 0,
    //         ]);

    //         $brand = $this->brand->create($request->all());

    //         if ($request->file('image')) {
    //             $brand->addMediaFromRequest('image')->toMediaCollection('images');
    //         }

    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }

    // public function update($request, $id)
    // {
    //     DB::beginTransaction();

    //     $brand = $this->findById($id);
    //     $request->restore ? $this->restoreSoftDelete($brand) : null;

    //     try {
    //         $request->merge([
    //             'start_date' => $request->start_date ? Carbon::parse($request->start_date)->toDateTimeString() : $request->start_date,
    //             'end_date' => $request->end_date ? Carbon::parse($request->end_date)->toDateTimeString() : $request->end_date,
    //             'order' => $request->order ? $request->order : $brand->order,
    //             'company_id' => $request->type == 'company' ? $request->company_id : null,
    //             'link' => $request->type == 'link' ? $request->link : null,
    //             'status' => $request->status ? 1 : 0,
    //         ]);
    //         $brand->update($request->all());

    //         if ($request->file('image')) {
    //             $brand->clearMediaCollection('images');
    //             $brand->addMediaFromRequest('image')->toMediaCollection('images');
    //         }

    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }

    // private function setSlug($request, $model)
    // {
    //     $slug = [];
    //     foreach ($request['title'] as $locale => $value) {
    //         $slug += [$locale => slugfy($value . ' ' . $locale, '-', $this->getModel())];
    //     }
    //     $model->slug = $slug;
    //     $model->save();
    // }

    // public function restoreSoftDelete($model)
    // {
    //     $model->restore();
    // }

    // public function delete($id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $model = $this->findById($id);

    //         if ($model->trashed()) :
    //             $model->clearMediaCollection('images');
    //             $model->forceDelete();
    //         else :
    //             $model->delete();
    //         endif;

    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }

    // public function deleteSelected($request)
    // {
    //     DB::beginTransaction();

    //     try {
    //         foreach ($request['ids'] as $id) {
    //             $model = $this->delete($id);
    //         }

    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }

    // public function QueryTable($request)
    // {
    //     $query = $this->brand->where(function ($query) use ($request) {
    //         $query->where('id', 'like', '%' . $request->input('search.value') . '%');
    //     })->orderBy('order');

    //     $query = $this->filterDataTable($query, $request);

    //     return $query;
    // }

    // public function filterDataTable($query, $request)
    // {
    //     // Search Categories by Created Dates
    //     if (isset($request['req']['from']) && $request['req']['from'] != '') {
    //         $query->whereDate('created_at', '>=', $request['req']['from']);
    //     }

    //     if (isset($request['req']['to']) && $request['req']['to'] != '') {
    //         $query->whereDate('created_at', '<=', $request['req']['to']);
    //     }

    //     if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'only') {
    //         $query->onlyDeleted();
    //     }

    //     if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'with') {
    //         $query->withDeleted();
    //     }

    //     if (isset($request['req']['status']) && $request['req']['status'] == '1') {
    //         $query->active();
    //     }

    //     if (isset($request['req']['status']) && $request['req']['status'] == '0') {
    //         $query->unactive();
    //     }

    //     return $query;
    // }
}
