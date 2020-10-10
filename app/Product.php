<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class Product extends Model
{
    protected $table = 'products';

    use Filterable;

    protected $fillable = [
        'code', 'pretty_name', 'sku','buy_into','price','discount','unit','star','origin','category_id','expired_discount','created_at','created_by','updated_at','created_by','deleted_at','deleted_by'
    ];


    // relationships
    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function description()
    {
        return $this->hasOne('App\ProductDescription','product_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','product_tag');
    }

    public function wh_items()
    {
        return $this->hasMany('App\WarehouseItem','product_id');
    }

    public function wh_logs()
    {
        return $this->hasMany('App\WarehouseLog','product_id');
    }

    public function product_images()
    {
        return $this->hasMany('App\ProductImage','product_id');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderItem','product_id');
    }

    // filterable
     
    public function filterSku($query, $value)
    {
        return $query->where('sku', 'LIKE', '%' . $value . '%');
    }

    public function filterSale($query, $value)
    {   
        $now = date('Y-m-d H:i:s');

        if($value == 'sale'){
            return $query->where('expired_discount','>',$now);
        }elseif($value == 'not_sale'){
            return $query->where('expired_discount','<',$now)->orWhere('expired_discount',null);
        }
        
    }
}
