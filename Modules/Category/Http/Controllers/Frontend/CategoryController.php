<?php

namespace Modules\Category\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\FrontEnd\CategoryRepository;
use Modules\QSale\Repositories\Frontend\AdsRepository;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $category,AdsRepository $adsRepository)
    {
        $this->category = $category;
        $this->adsRepository = $adsRepository;
    }


    public function show(Request $request, $slug)
    {
        $category = $this->category->findBySlug(
            $slug,
            [
                "children" => fn ($query) => $query
                    ->withCount([
                        "ads" => fn ($query) => $query->allowShow(),
                        "children" => fn ($query) => $query->active()
                    ])
                    ->active(),
            ],
            [
                "ads"        => fn ($query) => $query->allowShow()
            ]
        );

        return view("category::frontend.show", compact("category"));
    }

    public function index(Request $request)
    {
        $categories = $this->category->mainCategories();
        return view("category::frontend.index", compact("categories"));
    }

    public function listAds(Request $request,$slug){
//        dd($request->all());

        $category = $this->category->findBySlug(
            $slug,
            [
                "children" => fn ($query) => $query
                    ->withCount([
                        "ads" => fn ($query) => $query->allowShow(),
                        "children" => fn ($query) => $query->active()
                    ])
                    ->active(),
            ],
            [
                "ads"        => fn ($query) => $query->allowShow()
            ]
        );
        $data['category'] = $category;
        $request['category_id'] = $category->id;
        $data['ads'] = $this->adsRepository->listActive($request);
        $data['attributes'] =  isset($category->parent) ? $category->parent->SearchAttributes->merge($category->SearchAttributes) : $category->SearchAttributes ;
        return view("category::frontend.listAdsByCategory", $data);
    }
}
