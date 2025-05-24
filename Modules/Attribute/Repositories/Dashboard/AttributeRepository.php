<?php

namespace Modules\Attribute\Repositories\Dashboard;

use DB;
use Hash;
use Illuminate\Support\Facades\Cache;
use Modules\Attribute\Enums\AttributeType;
use Modules\Attribute\Entities\Attribute  as Model;

class AttributeRepository
{
    public function __construct(Model $model)
    {
        $this->model   = $model;
    }

    public function getAllActive($order = 'sort', $sort = 'desc')
    {
        $models = Cache::rememberForever('attributes', function () use ($order, $sort) {
            return $this->model->active()->orderBy($order, $sort)->get();
        });
        return $models;
    }

    public function getAllActiveSearch($order = 'sort', $sort = 'ASC')
    {
        $models = Cache::rememberForever('search_attributes', function () use ($order, $sort) {
            return $this->model->active()->where('show_in_search',1)->orderBy($order, $sort)->get();
        });
        return $models;
    }


    public function getAllForRelated()
    {
        return $this->model->active()->where('show_in_search',1);
    }

    public function getStatistics()
    {
        $count  =$this->model->count();
        return ["count" => $count];
    }


    public function getAll($order = 'sort', $sort = 'desc')
    {
        $models = $this->model->orderBy($order, $sort)->get();
        return $models;
    }

    public function findById($id, $with=[])
    {
        $model = $this->model->with($with)->withDeleted()->findOrFail($id);
        return $model;
    }


    public function create($request)
    {
        DB::beginTransaction();

        try {
            $image = $request->icon ? pathFileInStroage($request, "icon", "icons") : "/uploads/default.png";

            $model = $this->model->create([
                'status' => $request->status ? 1 : 0,
                "allow_from_to" => $request->allow_from_to  && $request->type == AttributeType::Number ? 1 :0,
                "show_in_search" => $request->show_in_search ? 1 :0,
                "icon" => $image,
                "validation" => $request->validation ,
                "type" => $request->type,
                "parent_id" => $request->parent_id,
                "related_options" => $request->options,
                "name" => $request->name
            ]);

            $model->refresh();
            $model->sort =  $request->sort ?? $model->id;
            $model->save();
            $this->createOptions($model, $request);

            //    dd($model);

            DB::commit();
            Cache::forget("attributes");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();



        $model = $this->findById($id);
        $restore = $request->restore ? $this->restoreSoftDelte($model) : null;
        $image =   $model->icon;
        if ($request->icon) {
            deleteFileInStroage($model->icon);
            $image = pathFileInStroage($request, "icon", "attributes");
        }

        try {
            $model->fill([
                'status'            => $request->status ? 1 : 0,
                "show_in_search"    => $request->show_in_search ? 1 :0,
                "allow_from_to"    => $request->allow_from_to  && $request->type == AttributeType::Number ? 1 :0,
                "icon"              => $image,
                "validation"        => $request->validation ,
                "type"              => $request->type,
                "sort"              => $request->sort,
                "name"              => $request->name,
                "parent_id" => $request->parent_id,
                "related_options" => $request->options,
            ]);


            $model->save();
            $this->createOptions($model, $request);
            $this->updateOptions($model, $request);
            $this->deleteOptions($model, $request);

            DB::commit();
            Cache::forget("attributes");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function restoreSoftDelte($model)
    {
        $model->restore();
    }



    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $model = $this->findById($id);

            if ($model->trashed()):
                $model->forceDelete(); else:
                $model->delete();
            endif;

            DB::commit();
            Cache::forget("attributes");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteSelected($request)
    {
        DB::beginTransaction();

        try {
            foreach ($request['ids'] as $id) {
                $model = $this->delete($id);
            }

            DB::commit();
            Cache::forget("attributes");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function QueryTable($request)
    {
        $query = $this->model->withDeleted()->where(function ($query) use ($request) {
            $query->where('id', 'like', '%'. $request->input('search.value') .'%');
            $query->orWhere('name', 'like', '%'. $request->input('search.value') .'%');
        });

        $query = $this->filterDataTable($query, $request);

        return $query;
    }

    public function filterDataTable($query, $request)
    {
        // Search Sections by Created Dates
        if (isset($request['req']['from']) && $request['req']['from'] != '') {
            $query->whereDate('created_at', '>=', $request['req']['from']);
        }

        if (isset($request['req']['to']) && $request['req']['to'] != '') {
            $query->whereDate('created_at', '<=', $request['req']['to']);
        }

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'only') {
            $query->onlyDeleted();
        }

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'with') {
            $query->withDeleted();
        }

        if (isset($request['req']['status']) &&  $request['req']['status'] == '1') {
            $query->active();
        }

        if (isset($request['req']['type']) &&  $request['req']['type'] == '1') {
            $query->where("type", $request['req']['type']);
        }

        if (isset($request['req']['status']) &&  $request['req']['status'] == '0') {
            $query->unactive();
        }

        return $query;
    }

    public function createOptions(&$model, &$request)
    {
        if (is_array($request->option)) {
            foreach($request->option as $option){
                if(isset($option['value'])){
                    $option['related_options'] = str_contains($option['related_options'],'[') ?  $option['related_options'] : explode(',',$option['related_options']) ;
                    $model->options()->create($option);
                }
            }
        }else{
            $model->options()->delete();
        }
    }

    public function updateOptions(&$model, &$request)
    {
        if (is_array($request->edit_option)) {
            foreach ($request->edit_option as $option) {
                $option['related_options'] = str_contains($option['related_options'],'[') ?  $option['related_options'] : explode(',',$option['related_options']) ;
                $model->options()->updateOrCreate(
                    [
                        "id" => $option["id"]
                    ],
                    $option
                );
            }
        }
    }

    public function deleteOptions(&$model, &$request)
    {
        if (is_array($request->deleteOptions)) {
            $model->options()->whereIn("id", $request->deleteOptions)->delete();
        }
    }
}
