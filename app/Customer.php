<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class Customer extends Model
{
    protected $table = 'customers';

    use Filterable;

    protected $fillable = [
        'name', 'phone', 'address','d_o_b','total_money','created_at','created_by','updated_at','created_by','deleted_at','deleted_by'
    ];

    protected $dates = ['d_o_b'];

    // relationships
    
    public function orders()
    {
        return $this->hasMany('App\Order','customer_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by')->withDefault([
            'name' => 'khách'
        ]);
    }

    // filterable

    public function filterPhone($query, $value)
    {
        return $query->where('phone', 'LIKE', '%' . $value . '%');
    }

    public function filterAddress($query, $value)
    {
        return $query->where('address', 'LIKE', '%' . $value . '%');
    }

}
