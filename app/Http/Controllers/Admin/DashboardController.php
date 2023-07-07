<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function convertToAddressAjax(Request $request)
    {
    	https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=37.42159&longitude=-122.0837&localityLanguage=en
    	$data = $request->arr;
    	$url = 'https://api.bigdatacloud.net/data/reverse-geocode-client';
    	$arr_data_return = [];
    	$id = 0;
    	foreach ($data as $key => $value) {
			if($value){
				$id++;
				$value = explode(',', $value);
		    	$data_return = $this->geoMapApi($value);
		    	array_push($arr_data_return,$data_return);
			}    		
    	}

    	return response()->json(['success'=>true,'arr'=>$arr_data_return]);

    }

    function geoMapApi($data){
    	$request_url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.$data[0].'&longitude='.$data[1].'&localityLanguage=en';
    	$request_url = 'https://geocode.xyz/'.$data[0].','.$data[1].'?json=1';

		$curl = curl_init($request_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
		  'X-RapidAPI-Host: api.bigdatacloud.net',
		  'Content-Type: application/json'
		]);
		$response = json_decode(curl_exec($curl),true);
		curl_close($curl);
		// dd($response);

		$data_return['city'] = '';
		$data_return['region'] = '';
		$data_return['country'] = '';
		if(array_key_exists('city',$response)){
			$data_return['city'] = $response['city'] != '' ? $response['city'].' , ' : '';
		}
		if(array_key_exists('region',$response)){
			$data_return['region'] = $response['region'] != '' ? $response['region'].' , ' : '';
		}
		if(array_key_exists('country',$response)){
			$data_return['country'] = $response['country'] != '' ? $response['country'].' .' : '';
		}
		// dd($response);

		$string = $data_return['city'].$data_return['region'].$data_return['country'];

		return $string;
    }
}
