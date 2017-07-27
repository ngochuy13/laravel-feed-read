<?php

namespace App\Services;

use App\Customer;

class DashBoardService
{

    /**
     * Get List Customer
     * @return array
     */
    public function listCustomer()
    {
        return Customer::orderBy('created_at', 'DESC')->paginate(config('form.common.perPage'));
    }
}
