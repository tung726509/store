<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\Filterable;

class User extends Authenticatable
{
    use Notifiable,Filterable,HasRoles;

    protected $fillable = [
        'name','username','lock','social_network','email', 'password','username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->hasMany('App\Category','created_by');
    }

    public function products()
    {
        return $this->hasMany('App\Product','created_by');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag','created_by');
    }

    public function created_wh()
    {
        return $this->hasMany('App\Warehouse','created_by');
    }

    public function created_wh_items()
    {
        return $this->hasMany('App\WarehouseItem','created_by');
    }

    public function created_wh_logs()
    {
        return $this->hasMany('App\WarehouseLog','action_by');
    }

    public function orders()
    {
        return $this->hasMany('App\Order','user_id');
    }

    public function confirm_orders()
    {
        return $this->hasMany('App\Order','export_by');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer','created_by');
    }
}
