<?php

namespace Modules\Brand\Repositories\Api;

use Modules\Brand\Entities\Brand;

class BrandRepository
{
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getAll($request)
    {
        $brands = $this->brand->Active()->Published()->orderBy('order')->get();

        return $brands;
    }
}
