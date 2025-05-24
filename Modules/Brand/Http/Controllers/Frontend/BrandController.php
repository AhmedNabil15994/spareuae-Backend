<?php

namespace Modules\Brand\Http\Controllers\Frontend;

use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Modules\Question\Entities\Question;

class BrandController extends Controller
{
    public function index()
    {
        return view('brand::frontend.brands.index', [
            'brands' => Brand::active()->withCount('questions')->get()
        ]);
    }

    public function show($id)
    {
        return view('brand::frontend.brands.show', [
            'questions' => Question::whereBrandId($id)->active()->withCount('comments')->paginate(10),
            'brand' => Brand::find($id),
        ]);
    }
}
