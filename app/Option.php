<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Response;
use Image;
use File;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = [
        'slug', 'name', 'content','created_at','updated_at',
    ];

    function saveBannerReturnInfo($link,$file,$width,$height){
    	$now = strtotime(Carbon::now());
        $image = $file;
        $origin_name = $image->getClientOriginalName();
        $type = $image->extension();
        $location = public_path($link);
        $name = $now.'.'.$type;
        $move = $image->move($location,$name);
        $img = Image::make($link.$name);

        if(File::exists($location.$name)){
            File::delete($location.$name);
        }

        $img->resize($width,$height)->save($link.$name);

        $info['name'] = $name;
        $info['link'] = $link;

        return $info;
    }

    function getOption(){
        $data = $this->get()->keyBy('slug')->toArray();

        return $data;
    }

    function getImageOption(){
        $arr_options = $this->get()->keyBy('slug')->toArray();
        $data['big_b_i'] = null;
        $data['med_b_i'] = null;
        $data['small_b_i'] = null;

        if(Arr::has($arr_options,'b_b_i')){
            $data['big_b_i'] = json_decode($arr_options['b_b_i']['content'],true);
        }

        if(Arr::has($arr_options,'m_b_i')){
            $data['med_b_i'] = json_decode($arr_options['m_b_i']['content'],true);
        }

        if(Arr::has($arr_options,'s_b_i')){
            $data['small_b_i'] = json_decode($arr_options['s_b_i']['content'],true);
        }

        return $data;
    }

}
