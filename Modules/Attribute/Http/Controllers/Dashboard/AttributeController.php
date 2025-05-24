<?php

namespace Modules\Attribute\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Attribute\Entities\Option;
use Modules\Core\Traits\DataTable;
use Modules\Attribute\Repositories\Dashboard\AttributeRepository as Repo ;
use Modules\Attribute\Transformers\Dashboard\AttributeResource as ModelResource;
use Modules\Attribute\Http\Requests\Dashboard\AttributeRequest  as ModelRequest;

class AttributeController extends Controller
{

    function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {

        return view('attribute::dashboard.attributes.index');
    }

    public function datatable(Request $request)
    {
        $datatable = DataTable::drawTable($request, $this->repo->QueryTable($request));

        $datatable['data'] = ModelResource::collection($datatable['data']);

        return Response()->json($datatable);
    }

    public function getOptionsByAttrId(Request $request)
    {
        return response()->json(['data' => Option::where('attribute_id',$request->attr_id)->pluck('value','id')->toArray()]);
    }

    public function create()
    {

        return view('attribute::dashboard.attributes.create');
    }

    public function store(ModelRequest $request)
    {
        try {
            $create = $this->repo->create($request);

            if ($create) {
                return Response()->json([true , __('apps::dashboard.messages.created')]);
            }

            return Response()->json([true , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function show($id)
    {
        return view('attribute::dashboard.attributes.show');
    }

    public function edit($id)
    {
        $model = $this->repo->findById($id, ["options","options.parent","options.related"]);

        //         dd($model->toArray());
        return view('attribute::dashboard.attributes.edit',compact('model'));
    }

    public function update(ModelRequest $request, $id)
    {
        try {
            $update = $this->repo->update($request,$id);

            if ($update) {
                return Response()->json([true , __('apps::dashboard.messages.updated')]);
            }

            return Response()->json([true , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
        try {
            $delete = $this->repo->delete($id);

            if ($delete) {
              return Response()->json([true , __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function deletes(Request $request)
    {
        try {
            $deleteSelected = $this->repo->deleteSelected($request);

            if ($deleteSelected) {
              return Response()->json([true , __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
