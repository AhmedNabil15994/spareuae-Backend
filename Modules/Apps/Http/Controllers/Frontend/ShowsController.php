<?php

namespace Modules\Apps\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\Frontend\UserRepository;


class ShowsController extends Controller
{
    public function __construct(
        public UserRepository $userRepository,
    ) {
    }

    public function index()
    {
        $shows = $this->userRepository->getAllShows('id','asc');
        return view('apps::frontend.car-shows',compact('shows'));
    }

    public function show(Request $request , $slug){
        $show = $this->userRepository->findShowBySlug($slug);
        return view("apps::frontend.show-details", compact("show"));
    }
}
