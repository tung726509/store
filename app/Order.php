<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use App\Traits\PhoneExistable;
use Carbon\Carbon;

class Order extends Model
{
    protected $table = 'orders';

    use Filterable,PhoneExistable;

    protected $fillable = [
        'code','user_id','customer_id','warehouse_id','price','address','types_of_fee','ship_fee','note','export_at','export_by','status','reason','status_at','created_at','created_by','updated_at','created_by','deleted_at','deleted_by'
    ];

    protected $dates = ['status_at','export_at'];

    // relationships
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function confirm_by()
    {
        return $this->belongsTo('App\User','export_by');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderItem','order_id');
    }

    // filterable

    public function filterCode($query, $value)
    {
        return $query->where('code', 'LIKE', '%' . $value . '%');
    }

    public function filterStatus($query, $value)
    {
        return $query->where('status',$value);
    }
}
