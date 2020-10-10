<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id', 'name', 'origin_name','created_at','created_by','updated_at','updated_by','deleted_at','deleted_by'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
