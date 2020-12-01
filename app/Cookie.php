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
        'cookie_string', 'customer_id', 'ip_address', 'created_at'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
