<?php

namespace Modules\Garage\Http\Controllers\Frontend;

use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Modules\Garage\Entities\Garage;
use Modules\Garage\Http\Requests\Frontend\GarageRequest;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Garage\Repositories\Frontend\GarageRepository;

class GarageController extends Controller
{
    public function __construct(public GarageRepository $garageRepository)
    {
        $this->middleware('auth')->only('create', 'store');
    }
    public function index()
    {
        $garages = $this->garageRepository->getPagination();
        return view('garage::frontend.garages.index', compact('garages'));
    }
    public function show(Garage $garage)
    {
        $garage->load('comments')->loadAvg('comments', 'info->stars')->loadCount('comments');

        return view('garage::frontend.garages.show', compact('garage'));
    }
    public function create()
    {
        return view('garage::frontend.garages.create');
    }
    public function store(GarageRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $image = Arr::pull($data, 'image');
        $garage = Garage::create($data);
        $garage->addMedia($image)->toMediaCollection('images');
        return back()->with('success', __("You successfully add you'r garage"));
    }
}
