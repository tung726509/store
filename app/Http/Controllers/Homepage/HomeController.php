<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;

use App\Category;
use App\Product;
use App\Option;


class HomeController extends Controller
{
    function __construct(){
        $this->product_m = new Product();
        $this->category_m = new Category();
        $this->option_m = new Option();
    }

    public function home(){
        // ưu đãi khách hàng
            $dataImageOption = $this->option_m->getImageOption();
            $arr_incentive_options = $this->option_m->getOptionIncentive();
            $use_birth_discount = null;
            $use_free_ship = null;
            $use_transfer_discount = null;
            // số ưu đãi khách hàng
            $ict_count = 0;
            if($this->option_m->checkIncentive($arr_incentive_options,'use_birth_discount')){
                $use_birth_discount = json_decode($arr_incentive_options['use_birth_discount'],true);
                $ict_count += 1;
            }
            if($this->option_m->checkIncentive($arr_incentive_options,'use_free_ship')){
                $use_free_ship = json_decode($arr_incentive_options['use_free_ship'],true);
                $ict_count += 1;
            }
            if($this->option_m->checkIncentive($arr_incentive_options,'use_transfer_discount')){
                $use_transfer_discount = json_decode($arr_incentive_options['use_transfer_discount'],true);
                $ict_count += 1;
            }

        $models = $this->product_m->with(['tags','product_images']);
        $products = $models->orderBy('created_at','desc')->get();
        $best_sell_products = $models->orderBy('created_at','desc')->get();
    	$new_products = clone $products->take(10);

        

        // dd($models,$products,$best_sell_products,$new_products);
        // dd($use_birth_discount,$use_free_ship,$use_transfer_discount);

    	return view('homepage.home.index',compact('products','best_sell_products','new_products','dataImageOption','use_birth_discount','use_free_ship','use_transfer_discount','ict_count'));
    }

    public function categories(Request $request,$code){
        // ưu đãi khách hàng
            $dataImageOption = $this->option_m->getImageOption();
            $arr_incentive_options = $this->option_m->getOptionIncentive();
            $use_birth_discount = null;
            $use_free_ship = null;
            $use_transfer_discount = null;
            // số ưu đãi khách hàng
            $ict_count = 0;
            if($this->option_m->checkIncentive($arr_incentive_options,'use_birth_discount')){
                $use_birth_discount = json_decode($arr_incentive_options['use_birth_discount'],true);
                $ict_count += 1;
            }
            if($this->option_m->checkIncentive($arr_incentive_options,'use_free_ship')){
                $use_free_ship = json_decode($arr_incentive_options['use_free_ship'],true);
                $ict_count += 1;
            }
            if($this->option_m->checkIncentive($arr_incentive_options,'use_transfer_discount')){
                $use_transfer_discount = json_decode($arr_incentive_options['use_transfer_discount'],true);
                $ict_count += 1;
            }

        $orderby = request()->query('orderby','l_to_h');
        $count = (int) request()->query('count',10);
        $param = [];

    	$category = $this->category_m->where('code',$code)->first();

    	if($category){
            $category_products = $this->product_m->with(['tags','product_images'])->where('category_id',$category->id);
            $new_products = $this->product_m->with(['tags','product_images'])->orderBy('created_at','desc')->get();
            $dataImageOption = $this->option_m->getImageOption();

            if($orderby == "l_to_h"){
                $category_products = $category_products->orderBy('price','asc');
            }else{
                $category_products = $category_products->orderBy('price','desc');
            }
            
            $category_products = $category_products->paginate($count);

    		return view('homepage.categories.index',compact('category_products','category','orderby','count','new_products','dataImageOption','use_birth_discount','use_free_ship','use_transfer_discount','ict_count'));
    	}else{
    		return $this->home();
    	}
    }

    public function productDetail(Request $request,$product_id){
        $product_id_decode = base64_decode($product_id);
    	$product = $this->product_m->with(['tags','description','product_images'])->where('code',$product_id_decode)->first();
        $related_products = $this->product_m->with(['tags','product_images'])->where('category_id',$product->category_id)->orderBy('created_at','desc')->get();
        $dataImageOption = $this->option_m->getImageOption();
        $big_b_i = $dataImageOption['big_b_i'];
        $med_b_i = $dataImageOption['med_b_i'];
        $small_b_i = $dataImageOption['small_b_i'];

        // dd($product);

    	return view('homepage.detail.index',compact('product','related_products','dataImageOption','big_b_i','med_b_i','small_b_i'));
    }

    public function FunctionName($value='')
    {
        
    }

}
