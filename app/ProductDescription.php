<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
	protected $table = 'product_descriptions';

    protected $fillable = [
        'product_id', 'origin', 'trademark','user_manual','note','description','preservation','size','created_by','updated_by','deleted_by','updated_at','deleted_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
