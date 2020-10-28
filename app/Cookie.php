<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class Cookie extends Model
{
    protected $table = 'cookies';

    use Filterable;

    protected $fillable = [
        'cookie_code', 'customer_id', 'created_at', 'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }

}
