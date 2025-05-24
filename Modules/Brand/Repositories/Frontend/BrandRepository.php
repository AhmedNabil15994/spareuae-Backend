<?php

namespace Modules\Brand\Repositories\Frontend;


use Modules\Brand\Entities\Brand;

class BrandRepository
{
    private $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getAllActive($order = 'id', $sort = 'desc')
    {
        return $this->model->active()->orderBy($order, $sort)->get();
    }

    public function take($take = 6, $order = 'id', $sort = 'desc')
    {
        $nationalities = $this->model->active()->orderBy($order, $sort)->take($take)->get();
        return $nationalities;
    }

    public function getAll($order = 'id', $sort = 'desc')
    {
        $nationalities = $this->model->active()->orderBy($order, $sort)->get();
        return $nationalities;
    }

    public function getPagination($order = 'id', $sort = 'desc', $pagination = 10)
    {
        $nationalities = $this->model->active()->orderBy($order, $sort)->paginate($pagination);
        return $nationalities;
    }

    public function findById($id)
    {
        $model = $this->model->active()->find($id);
        return $model;
    }

    public function QueryTable($request)
    {
        $query = $this->model->where(function ($query) use ($request) {
            $query->where('id', 'like', '%' . $request->input('search.value') . '%');
            $query->orWhere(function ($query) use ($request) {
                $query->whereHas('translations', function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->input('search.value') . '%')
                        ->orWhere('description', 'like', '%' . $request->input('search.value') . '%');
                });
            });
        });

        $query = $this->filterDataTable($query, $request);

        return $query;
    }

    public function filterDataTable($query, $request)
    {
        if (isset($request['req']['from']) && $request['req']['from'] != '') {
            $query->whereDate('created_at', '>=', $request['req']['from']);
        }
        if (isset($request['req']['to']) && $request['req']['to'] != '') {
            $query->whereDate('created_at', '<=', $request['req']['to']);
        }
        if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'only') {
            $query->onlyDeleted();
        }
        if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'with') {
            $query->withDeleted();
        }
        if (isset($request['req']['status']) && $request['req']['status'] == '1') {
            $query->active();
        }
        if (isset($request['req']['status']) && $request['req']['status'] == '0') {
            $query->unactive();
        }
        return $query;
    }
}
