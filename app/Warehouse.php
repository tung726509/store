<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'name', 'address', 'created_at','created_by', 'updated_at', 'updated_by','deleted_at', 'deleted_by'
    ];

    public function wh_items()
    {
        return $this->hasMany('App\WarehouseItem','warehouse_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    // filterable
}
