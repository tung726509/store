<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class OrderItem extends Model
{
    protected $table = 'order_items';

    use Filterable;

    protected $fillable = [
        'order_id', 'product_id', 'quantity','discount','price','items_origin','created_at','created_by','updated_at','created_by','deleted_at','deleted_by'
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

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
}
