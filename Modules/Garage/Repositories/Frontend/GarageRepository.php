<?php

namespace Modules\Garage\Repositories\Frontend;


use Modules\Garage\Entities\Garage;

class GarageRepository
{
    private $model;

    public function __construct(Garage $model)
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
}
