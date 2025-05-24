<?php

namespace Modules\Customer\Http\Controllers\Frontend;

use Modules\Customer\Entities\Customer;
use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class CustomerController extends Controller
{
    public function index()
    {
        $customers=Customer::latest()->get();
        return  view('customer::frontend.index', compact('customers'));
    }
}
