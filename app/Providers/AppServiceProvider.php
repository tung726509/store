<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Category;
use App\Option;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    function __construct(){
        $this->category_m = new Category();
        $this->option_m = new Option();
        $this->tag_m = new Tag();
    }

    public function register(){

    }

    public function boot(Request $request){
        if ($request->is('admin_bts/*')) {
            // chưa có gì
        }else{
            $now = Carbon::now();
            $now_timestamp = strtotime($now);
            $categories = $this->category_m->withCount(['products'])->get();
            $options = $this->option_m->getOption();
            $tags = $this->tag_m->get();

            // option images
                $dataImageOption = $this->option_m->getImageOption();

            // ưu đãi khách hàng (bắt buộc phải có vì chuyền ra trang /mycart sử dụng)
                $cv_ict = $this->convertIncentive();
                $use_birth_discount = $cv_ict['use_birth_discount'];
                $use_free_ship = $cv_ict['use_free_ship'];
                $use_transfer_discount = $cv_ict['use_transfer_discount'];
                $ict_count = $cv_ict['ict_count'];

            // dd($use_free_ship);

            View::share([
                'categories' => $categories,
                'options' => $options,
                'tags' => $tags,
                'dataImageOption' => $dataImageOption,
                'use_birth_discount' => $use_birth_discount,
                'use_free_ship' => $use_free_ship,
                'use_transfer_discount' => $use_transfer_discount,
                'ict_count' => $ict_count,
                'now' => $now,
                'now_timestamp' => $now_timestamp,
            ]);
        }
    }

    // lấy các chương trình khuyến mãi
    public function convertIncentive()
    {
        $arr_incentive_options = $this->option_m->getOptionIncentive();
        $use_birth_discount = null;
        $use_free_ship = null;
        $use_transfer_discount = null;

        // số ưu đãi khách hàng
        $ict_count = 0;
        if($this->option_m->checkIncentive($arr_incentive_options,'use_birth_discount'))
            $use_birth_discount = json_decode($arr_incentive_options['use_birth_discount'],true);
            $ict_count += 1;
        
        if($this->option_m->checkIncentive($arr_incentive_options,'use_free_ship'))
            $use_free_ship = json_decode($arr_incentive_options['use_free_ship'],true);
            $ict_count += 1;
        
        if($this->option_m->checkIncentive($arr_incentive_options,'use_transfer_discount'))
            $use_transfer_discount = json_decode($arr_incentive_options['use_transfer_discount'],true);
            $ict_count += 1;

        $data = [
            'use_birth_discount' => $use_birth_discount,
            'use_free_ship' => $use_free_ship,
            'use_transfer_discount' => $use_transfer_discount,
            'ict_count' => $ict_count,
        ];

        return $data;
    }
}
