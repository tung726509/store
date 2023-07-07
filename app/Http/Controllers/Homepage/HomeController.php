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

use App\Category;
use App\Product;
use App\Option;
use App\Customer;
use App\CartItem;
use App\Cookiee;

class HomeController extends Controller
{
    use GenerateRandomString;

    function __construct(){
        $this->product_m = new Product();
        $this->category_m = new Category();
        $this->option_m = new Option();
        $this->customer_m = new Customer();
        $this->cookiee_m = new Cookiee();

        $new_ck_val = strtotime(Carbon::now()).$this->generateRandomString(4);
        $this->new_ck_val = $new_ck_val;
        $this->new_cookie = cookie('cookie_string', $new_ck_val ,7200);

        if(Cookie::get('cookie_string')){
            $get_ck_val = Crypt::decryptString(Cookie::get('cookie_string'));
        }else{
            $get_ck_val = null;
        }

        if( $get_ck_val && strlen($get_ck_val) >= 14 ){
            $this->new_ck_val = $get_ck_val;
            $this->new_cookie = cookie('cookie_string', $get_ck_val ,7200);
        }

        $customer = $this->checkCookieReturnCustomer();
        $this->customer = $customer;
        $this->cart_items = $this->getCartItemFromCustomer($customer);
    }

    public function login(){
        $customer = $this->customer;
        $cart_items = $this->cart_items;

        if($customer){
            return $this->myCart();
        }

        return response()->view('homepage.login.index',compact('customer','cart_items'))->withCookie($this->new_cookie);
    }

    public function home(Request $request){
        $customer = $this->customer;
        $cart_items = $this->cart_items;

        // các thể loại sản phẩm
            $models = $this->product_m->with(['tags','product_images']);
            $products = $models->orderBy('created_at','desc')->get();
            $best_sell_products = $models->orderBy('created_at','desc')->get();
	        $new_products = clone $products->take(10);

    	return response()->view('homepage.home.index',compact('products','best_sell_products','new_products','customer','cart_items'))->withCookie($this->new_cookie);
    }

    public function categories(Request $request,$code){
        $customer = $this->customer;
        $cart_items = $this->cart_items;

        $orderby = request()->query('orderby','l_to_h');
        $count = (int) request()->query('count',10);
        $param = [];

    	$category = $this->category_m->where('code',$code)->first();

    	if($category){
            $category_products = $this->product_m->with(['tags','product_images'])->where('category_id',$category->id);
            $new_products = $this->product_m->with(['tags','product_images'])->orderBy('created_at','desc')->get();

            if($orderby == "l_to_h"){
                $category_products = $category_products->orderBy('price','asc');
            }else{
                $category_products = $category_products->orderBy('price','desc');
            }

            $category_products = $category_products->paginate($count);

    		return response()->view('homepage.categories.index',compact('category_products','category','orderby','count','new_products','customer','cart_items'))->withCookie($this->new_cookie);
    	}else{
    		return $this->home();
    	}
    }

    public function productDetail(Request $request,$product_id){
        $customer = $this->customer;
        $cart_items = $this->cart_items;

        $product_id_decode = base64_decode($product_id);
    	$product = $this->product_m->with(['tags','description','product_images', 'category'])->where('code',$product_id_decode)->first();
        $related_products = $this->product_m->with(['tags','product_images'])->where('category_id',$product->category_id)->orderBy('created_at','desc')->get();
        $category = $product->category;
        // dd($category);

    	return response()->view('homepage.product-detail.index',compact('product','related_products','customer','cart_items', 'category'))->withCookie($this->new_cookie);
    }

    public function myCart(Request $request){
        $customer = $this->customer;
        if($customer == null){
            return redirect()->to('login');
        }

        $cart_items = $this->cart_items;

        if(!$cart_items){
            $cart_items = collect([]);
        }

        $d_o_b = $customer->d_o_b;
        if($d_o_b){
            $d_o_b = (int) $d_o_b->format('m');
        }
        $current_month = Carbon::now()->month;
        $birth_discount = false;
        if($d_o_b == $current_month){
            $birth_discount = true;
        }

        return response()->view('homepage.mycart.index',compact('customer','cart_items','birth_discount'))->withCookie($this->new_cookie);
    }

    public function checkCookieReturnCustomer(){
        $customer = null;
        $new_ck_val = $this->new_ck_val;

        if($new_ck_val){
            $cookie = $this->cookiee_m->where('cookie_string',$new_ck_val)->first();
            if($cookie){
                if($cookie->customer_id){
                    $customer = $this->customer_m->with(['cart_items','cart_items.product'])->find($cookie->customer_id);
                }
                $cookie->update(['updated_at'=>Carbon::now()]);
            }else{
                $this->cookiee_m->create(['cookie_string'=>$new_ck_val,'created_at'=>Carbon::now(),'updated_at'=>null]);
            }
        }

        return $customer;
    }

    public function getCartItemFromCustomer($customer){
        $cart_items = null;

        if($customer){
            if($customer->cart_items->count() > 0){
                $cart_items = $customer->cart_items->where('status',null);
            }else{
                // dd('ko có item');
            }
        }

        return $cart_items;
    }
}
