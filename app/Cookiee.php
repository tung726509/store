<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class Cookiee extends Model
{
    protected $table = 'cookiees';

    use Filterable;

    protected $fillable = [
        'cookie_string', 'customer_id', 'ip_address', 'created_at', 'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
