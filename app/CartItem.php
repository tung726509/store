<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class CartItem extends Model
{
    protected $table = 'cart_items';

    use Filterable;

    protected $fillable = [
        'product_id', 'quantity', 'customer_id', 'created_at'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
