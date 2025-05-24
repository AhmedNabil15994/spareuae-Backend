<?php

namespace Modules\QSale\ViewComposers\Dashboard;

use Modules\QSale\Repositories\Dashboard\BrandRepository as Repo;
use Illuminate\View\View;


class BrandComposer
{
    public $packages = [];

    public function __construct(Repo $repo)
    {

        $this->packages =  $repo->getAllActive();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('packages' , $this->packages);
    }
}
