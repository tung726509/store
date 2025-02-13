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
use App\Rules\VietnamesePhone;
use Illuminate\Support\Facades\Validator;

use App\Customer;
use App\Product;
use App\CartItem;
use App\Cookiee;

class AjaxController extends Controller
{
	use GenerateRandomString;

	function __construct(){
        $this->customer_m = new Customer();
        $this->product_m = new Product();
        $this->cartitem_m = new CartItem();
    }

    public function attachCustomerWithCookie(Request $request){
        // dd(Cookie::get('cookie_string'));
		$customer = null;
    	if($request->ajax()){
	    	$phone = $request->phone;
            $customer = Customer::firstOrCreate([
                'phone' => $phone
            ], [
                'updated_at' => null
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

    public function trashItemInCart(Request $request){
        if($request->ajax()){
            $id = $request->id;

            if($id){
                // $deleted = CartItem::where('id',$id)->delete();
                // if($deleted){
                    return Response::json(['success'=>true]);
                // }else{
                    // return Response::json(['success'=>false]);
                // }
            }else{
                return Response::json(['success'=>false]);
            }
        }

            
        return Response::json(['success'=>false]);
    }

    public function updateCustomerInfo(Request $request){
        $rules = [
            'phone' => ['required',new VietnamesePhone,'exists:customers,phone'],
            'name' => ['required','string','min:1','max:50'],
            'date' => ['required','date'],
            'address' => ['required','string','min:1','max:255'],
        ];

        $messages = [
            'phone.required' => 'Vui lòng nhập SĐT',
            'phone.exists' => 'SĐT không tồn tại',
            'name.required' => 'Vui lòng nhập tên KH',
            'name.string' => 'Chỉ được nhập chuỗi',
            'name.min' => 'Tối thiểu 1 kí tụ',
            'name.max' => 'Tối đa 255 kí tụ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.string' => 'Chỉ được nhập chuỗi',
            'address.min' => 'Tối thiểu 1 kí tụ',
            'address.max' => 'Tối đa 255 kí tụ',
            'date.required' => 'Vui lòng chọn ngày tháng năm sinh',
            'date.date' => 'Ngày tháng không hợp lệ',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            $errors = $validator->errors()->toArray();

            return Response::json(['success' => false,'errors' => $errors]);
        }else{
            $phone = $request->input('phone');
            $name = $request->input('name');
            $address = $request->input('address');
            $d_o_b = $request->input('date');
            $customer = $this->customer_m->where('phone',$phone)->first();

            if($customer){
                $customer->name = $name;
                $customer->address = $address;
                // là khách hàng vừa tạo mới update đc sinh nhật
                if($customer->updated_at == null || $customer->d_o_b == null){
                    $customer->d_o_b = $d_o_b;
                }
                $update = $customer->save();
                if($update){
                    $d_o_b = $customer->d_o_b;
                    if($d_o_b){
                        $d_o_b = (int) $d_o_b->format('m');
                    }
                    $current_month = Carbon::now()->month;
                    $birth_discount = false;
                    if( $d_o_b == $current_month )
                        $birth_discount = true;

                    return Response::json(['success' => true,'birth_discount' => $birth_discount,'customer' => $customer]);
                }else{
                    return false;
                }
            }

            return false;
        }
    }

    public function addProductToCart(Request $request){
        if($request->ajax()){
            $product_id = $request->product_id;
            $customer_id = $request->customer_id;

            if($customer_id && $product_id){
                $customer = $this->customer_m->find($customer_id);
                $product = $this->product_m->find($product_id);

                if(!$customer)
                    return Response::json(['success'=>false,'message'=>'Người dùng không tồn tại !']);
                
                if(!$product)
                    return Response::json(['success'=>false,'message'=>'Sản phẩm không tồn tại !']);

                $cart_item = $this->cartitem_m->where([
                    'product_id'=>$product_id,
                    'customer_id'=>$customer_id,
                    'status'=>null
                ])->first();

                if($cart_item){
                    $cart_item->quantity = (int)$cart_item->quantity + 1;
                    $updated = $cart_item->save();

                    if($updated){
                        return Response::json(['success'=>true,'message'=>'Đã thêm sản phẩm vào giỏ hàng !','status'=>'update']);
                    }else{
                        return Response::json(['success'=>false,'message'=>'Lỗi hệ thống , vui lòng thử lại sau !']);
                    }
                }else{
                    $created = $this->cartitem_m->create([
                        'customer_id' => $customer_id,
                        'product_id' => $product_id,
                        'quantity' => 1,
                        'status' => null,
                        'created_at' => Carbon::now(),
                    ]);

                    if($created){
                        return Response::json(['success'=>true,'message'=>'Đã thêm sản phẩm vào giỏ hàng !','status'=>'create']);
                    }else{
                        return Response::json(['success'=>false,'message'=>'Lỗi hệ thống , vui lòng thử lại sau !']);
                    }
                }
            }else{
                return Response::json(['success'=>false,'message'=>'Lỗi hệ thống , vui lòng thử lại sau !']);
            }
        }

        return false;
    }
}
