<?php

namespace App\Traits;
use App\Customer;

trait PhoneExistable {

    public function checkExist($data)
    {
        $customer = Customer::where('phone',$data['phone'])->first();

        return $customer;        
    }
}