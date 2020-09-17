<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseLog extends Model
{
    protected $table = 'warehouse_logs';

    protected $fillable = [
        'warehouse_item_id','product_id', 'quantity','old_quantity', 'action', 'action_by','reason','created_at','created_by', 'updated_at', 'updated_by'
    ];	

    public function wh_item()
    {
        return $this->belongsTo('App\WarehouseItem','warehouse_item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','action_by');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
