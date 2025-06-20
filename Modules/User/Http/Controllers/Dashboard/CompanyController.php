<?php

namespace Modules\User\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Traits\DataTable;
use Modules\Category\Enum\CategoryType;
use Modules\User\Transformers\Dashboard\CompanyResource;
use Modules\User\Http\Requests\Dashboard\CompanyStoreRequest;
use Modules\User\Repositories\Dashboard\CompanyRepository as User;
use Modules\Category\Repositories\Dashboard\CategoryRepository as Category;

class CompanyController extends Controller
{
    public function __construct(User $user, Category $category)
    {
        $this->category = $category;
        $this->user = $user;
    }

    public function index()
    {
        return view('user::dashboard.companies.index');
    }

    public function listSelect2(Request $request)
    {
        return $this->user->getAllUsersSelect2($request);
    }

    public function datatable(Request $request)
    {
        $datatable = DataTable::drawTable($request, $this->user->QueryTable($request));

        $datatable['data'] = CompanyResource::collection($datatable['data']);

        return Response()->json($datatable);
    }

    public function create()
    {
        $companyCategories = $this->category->mainCategoriesBasedType(CategoryType::COMPANY);
       
        return view('user::dashboard.companies.create', compact('companyCategories'));
    }

    public function store(CompanyStoreRequest $request)
    {
        try {
            $create = $this->user->create($request);

            if ($create) {
                return Response()->json([true, __('apps::dashboard.messages.created')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function show($id)
    {
        $user = $this->user->findById($id, ["company.categories", "currentSubscription.package"]);
        return view('user::dashboard.companies.view', compact("user"));
    }

    public function edit($id)
    {
        $user = $this->user->findById($id, ["company.categories", "currentSubscription.package"]);
        $companyCategories = $this->category->mainCategoriesBasedType(CategoryType::COMPANY);
        return view('user::dashboard.companies.edit', compact('user', 'companyCategories'));
    }

    public function renwal($id)
    {
        $user = $this->user->findById($id, ["currentSubscription.package"]);
        abort_if(is_null($user->currentSubscription) || is_null($user->currentSubscription->package), "404");
        $this->user->renwal($user);
        return back()->with(["success" => __('apps::dashboard.messages.renwal')]);
    }

    public function update(CompanyStoreRequest $request, $id)
    {
        try {
            $update = $this->user->update($request, $id);

            if ($update) {
                return Response()->json([true, __('apps::dashboard.messages.updated')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
        try {
            $delete = $this->user->delete($id);

            if ($delete) {
                return Response()->json([true, __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function deletes(Request $request)
    {
        try {
            $deleteSelected = $this->user->deleteSelected($request);

            if ($deleteSelected) {
                return Response()->json([true, __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([true, __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
