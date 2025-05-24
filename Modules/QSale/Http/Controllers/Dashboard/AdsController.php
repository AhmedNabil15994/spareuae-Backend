<?php

namespace Modules\QSale\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Brand;
use Modules\Category\Repositories\Dashboard\CategoryRepository;
use Modules\Core\Traits\DataTable;
use Modules\QSale\Http\Requests\Dashboard\AdsRequest as ModelRequest;
use Modules\QSale\Repositories\Dashboard\AdsRepository as Repo;
use Modules\QSale\Transformers\Dashboard\AdsResource as ModelResource;
use Modules\QSale\Transformers\Dashboard\ComplaintResource;

class AdsController extends Controller
{
    protected $repo;
    protected $category;

    public function __construct(Repo $repo, CategoryRepository $category)
    {
        $this->repo = $repo;
        $this->category = $category;
    }

    public function index()
    {
        return view('qsale::dashboard.ads.index');
    }

    public function datatable(Request $request)
    {
        $datatable = DataTable::drawTable($request, $this->repo->QueryTable($request));

        $datatable['data'] = ModelResource::collection($datatable['data']);

        return Response()->json($datatable);
    }

    public function select2(Request $request)
    {
        return Response()->json($this->repo->getAllSelect2($request));
    }

    public function complaientDatatable(Request $request, $id)
    {
        $model = $this->repo->findById($id);

        $datatable = DataTable::drawTable($request, $this->repo->ComplaintQueryTable($request, $model));

        $datatable['data'] = ComplaintResource::collection($datatable['data']);

        return Response()->json($datatable);
    }

    public function create()
    {
        $brands = Brand::active()->get(['id', 'title']);
        return view('qsale::dashboard.ads.create', compact('brands'));
    }

    public function store(ModelRequest $request)
    {
        try {
            $create = $this->repo->create($request);

            if ($create) {
                return Response()->json([true, __('apps::dashboard.messages.created')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException$e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function show($id)
    {
        $with = ["user", "media", "addations", "attributes.attribute", "category", "office", "country", "city", "state"];
        $model = $this->repo->findById($id, $with);
        if (!$model) {
            abort(404);
        }
        return view('qsale::dashboard.ads.view', compact("model"));
    }

    public function edit($id)
    {
        $with = ["media", "addations", "attributes.attribute.options"];
        $model = $this->repo->findById($id, $with);
        if (!$model) {
            abort(404);
        }
        $mainCategories = $this->category->mainCategoriesBasedType($model->user_type);

        $brands = Brand::active()->get(['id', 'title']);
        return view('qsale::dashboard.ads.edit', compact('model', 'mainCategories', 'brands'));
    }

    public function update(ModelRequest $request, $id)
    {
        try {
            $update = $this->repo->update($request, $id);

            if ($update) {
                return Response()->json([true, __('apps::dashboard.messages.updated')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException$e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
        try {
            $delete = $this->repo->delete($id);

            if ($delete) {
                return Response()->json([true, __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException$e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function deletes(Request $request)
    {
        try {
            $deleteSelected = $this->repo->deleteSelected($request);

            if ($deleteSelected) {
                return Response()->json([true, __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException$e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
