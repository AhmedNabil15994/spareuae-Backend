<?php

namespace Modules\Brand\ViewComposers\Frontend;

use Cache;
use Illuminate\View\View;
use Modules\Brand\Repositories\Frontend\BrandRepository;

class BrandComposer
{
    public function __construct(BrandRepository $brand)
    {
        $this->brands =  $brand->getAllActive();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('brands', $this->brands);
    }
}
