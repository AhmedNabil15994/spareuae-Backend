<?php

namespace Modules\Garage\Repositories\Api;

use Modules\Garage\Entities\Garage;

class GarageRepository
{
    public function __construct(Garage $garage)
    {
        $this->garage = $garage;
    }

    public function getAll($request)
    {
        $garages = $this->garage->Active()->Published()->orderBy('order')->get();

        return $garages;
    }
}
