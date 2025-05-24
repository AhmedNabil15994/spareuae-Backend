<?php

namespace Modules\Garage\Repositories\Dashboard;

use DB;
use Carbon\Carbon;
use Modules\Garage\Entities\Garage;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class GarageRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Garage::class);
        $this->statusAttribute = ["status", 'is_certified'];
    }
}
