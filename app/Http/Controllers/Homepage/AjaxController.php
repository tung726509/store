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
use App\Cookiee;

class AjaxController extends Controller
{
	use GenerateRandomString;

	function __construct(){
        $this->customer_m = new Customer();
    }

    public function attachCustomerWithCookie(Request $request)
    {
        // dd(Cookie::get('cookie_string'));
		$customer = null;
    	if($request->ajax()){
	    	$phone = $request->phone;
            $customer = Customer::firstOrCreate([
                'phone' => $phone
            ], [

            ]);

            if($customer){
                $cookie_update = Cookiee::where('cookie_string',Cookie::get('cookie_string'))->update([
                    'customer_id' => $customer->id
                ]);

                return Response::json(['success' => true,'customer' => $customer]);
            }else{
                return Response::json(['success' => false]);
            }
    	}

    	return false;
    }
}
