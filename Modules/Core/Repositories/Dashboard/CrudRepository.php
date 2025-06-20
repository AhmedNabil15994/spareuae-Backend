<?php

namespace Modules\Core\Repositories\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Core\Traits\RepositorySetterAndGetter;
use Modules\Core\Traits\Dashboard\HandleStatusAndFile;

class CrudRepository
{
    use RepositorySetterAndGetter;
    use HandleStatusAndFile;


    public function __construct($model = null)
    {
        $this->model = $model ? new $model() : $model;
    }



    /**
     * Prepare Data before save or edir
     *
     * @param array $data
     * @param \Illuminate\Http\Request $request
     * @param boolean $is_create
     * @return array
     */
    public function prepareData(array $data, Request $request, $is_create = true): array
    {
        return $data;
    }

    /**
     * Model created call back function
     *
     * @param mixed $model
     * @param \Illuminate\Http\Request $request is Request
     * @return void
     */
    public function modelCreated($model, $request, $is_created = true): void
    {
    }

    /**
     * Model update call back function
     *
     * @param mixed $model
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function modelUpdated($model, $request): void
    {
    }

    /**
     * Append custom filter
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function appendFilter(&$query, $request): \Illuminate\Database\Eloquent\Builder
    {
        return $query;
    }

    /**
     * Append custom filter
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function appendSearch(&$query, $request): \Illuminate\Database\Eloquent\Builder
    {
        return $query;
    }

    /**
     * Model commited call back function
     *
     * @param mixed $model
     * @param \Illuminate\Http\Request $request
     * @param string $event_type is created flag
     * @return void
     */
    public function commitedAction($model, $request, $event_type = "create"): void
    {
    }

    /**
     * @param $action
     * @return int
     */
    protected function switchOn($action)
    {
        return 1;
    }

    /**
     * @param $action
     * @return int
     */
    protected function switchOff($action)
    {
        return 0;
    }

    /**
     * @param $action
     * @param $on
     * @param $off
     */
    protected function switching($action, $on, $off): void
    {
    }


    public function getAllActive($order = 'id', $sort = 'desc')
    {
        $record = $this->getModel()->active()->orderBy($order, $sort)->get();
        return $record;
    }

    public function getAll($order = 'id', $sort = 'desc')
    {
        $record = $this->getModel()->orderBy($order, $sort)->get();
        return $record;
    }

    public function findById($id)
    {
        if (method_exists($this->model, 'trashed')) {
            $model = $this->model->withDeleted()->findOrFail($id);
        } else {
            $model = $this->model->findOrFail($id);
        }

        return $model;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($key = array_search('null', $request->all())) {
                $request->merge([$key => null]);
            }
            // handle status attibute
            $status = $this->handleStatusInRequest($request);
            $data = $request->all();
            if (count($status) > 0) {
                $data = array_merge($data, $status);
            }
            // call the prepareData fuction
            $data = $this->prepareData($data, $request, false);

            $model = $this->model->create($data);

            // call back model created
            $this->modelCreated($model, $request);

            $this->handleFileAttributeInRequest($model, $request, true);

            DB::commit();
            $this->commitedAction($model, $request, "create");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $model = $this->findById($id);
        $request->trash_restore ? $this->restoreSoftDelete($model) : null;

        try {
            if ($key = array_search('null', $request->all())) {
                $request->merge([$key => null]);
            }

            $status = $this->handleStatusInRequest($request);
            $data = $request->all();
            if (count($status) > 0) {
                $data = array_merge($data, $status);
            }
            // call the prepareData fuction
            $data = $this->prepareData($data, $request, false);

            $model->update($data);

            // call the callback  fuction
            $this->modelUpdated($model, $request);

            $this->handleFileAttributeInRequest($model, $request, true);

            DB::commit();
            $this->commitedAction($model, $request, "update");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function restoreSoftDelete($model)
    {
        $model->restore();
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $model = $this->findById($id);

            if (method_exists($this->model, 'trashed')) {
                if ($model->trashed()) :
                    $this->deleteFiles($model);
                    $model->forceDelete();
                else :
                    $model->delete();
                endif;
            } else {
                if (method_exists($this->model, 'media')) {
                    $this->deleteFiles($model);
                }
                $model->delete();
            }

            DB::commit();
            $this->commitedAction($model, $request = null, "delete");
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
                $this->delete($id);
            }

            DB::commit();
            $this->commitedAction(null, $request, "multi_delete");
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function QueryTable($request)
    {
        $query = $this->getModel()->where(function ($query) use ($request) {
            $query->where('id', 'like', '%' . $request->input('search.value') . '%');
            $this->appendSearch($query, $request);
            foreach ($this->getModelTranslatable() as $key) {
                $query->orWhere($key . '->' . locale(), 'like', '%' . $request->input('search.value') . '%');
            }
        });

        $query = $this->filterDataTable($query, $request);

        return $query;
    }

    public function filterDataTable($query, $request)
    {
        // Search Categories by Created Dates


        if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'only') {
            $query->onlyDeleted();
        } else {
            if (isset($request['req']['from']) && $request['req']['from'] != '') {
                $query->whereDate('created_at', '>=', $request['req']['from']);
            }

            if (isset($request['req']['to']) && $request['req']['to'] != '') {
                $query->whereDate('created_at', '<=', $request['req']['to']);
            }

            if (isset($request['req']['status']) && $request['req']['status'] == '1') {
                $query->active();
            }

            if (isset($request['req']['status']) && $request['req']['status'] == '0') {
                $query->unactive();
            }
        }



        if (isset($request['req']['deleted']) && $request['req']['deleted'] == 'with') {
            $query->withDeleted();
        }

        // call append filter
        $this->appendFilter($query, $request);

        return $query;
    }

    /**
     * @param $id
     * @param $action
     * @return bool
     * @throws \Exception
     */
    public function switcher($id, $action)
    {
        DB::beginTransaction();

        try {
            $model = $this->findById($id);
            $on = $this->switchOn($action);
            $off = $this->switchOff($action);;
            $this->switching($action, $on, $off);

            if ($model->$action == $on) {
                $model->$action = $off;
            } elseif ($model->$action == $off) {
                $model->$action = $on;
            } else {
                return false;
            }
            $model->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
