<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use App\Traits\GenerateRandomString;
use Illuminate\Support\Facades\Crypt;
use Response;

use App\Customer;

class AjaxController extends Controller
{
	use GenerateRandomString;

	function __construct(){
        $this->customer_m = new Customer();
    }

    public function getCustomerByPhone(Request $request)
    {
		$customer = null;
    	if($request->ajax()){
	    	$phone = $request->phone;
    		$customer = Customer::where('phone',$phone)->first();
    		if($customer){
    			
    		}

    		return Response::json(['customer' => $customer]);
    	}

    	return false;
    }
}
