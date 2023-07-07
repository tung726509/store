<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Whlogable;

class WarehouseItem extends Model
{
    protected $table = 'warehouse_items';

    use Whlogable;

    protected $fillable = [
        'product_id', 'warehouse_id','quantity', 'created_at','created_by', 'updated_at', 'updated_by','deleted_at', 'deleted_by'
    ];

    public function wh()
    {
        return $this->belongsTo('App\Warehouse','warehouse_id');
    }

    public function wh_logs()
    {
        return $this->hasMany('App\WarehouseLog','warehouse_item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
