<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Carbon\Carbon;

class Category extends Model
{
	protected $table = 'categories';

    use Filterable;

    protected $fillable = [
        'code', 'pretty_name', 'image_name','created_at','created_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function products()
    {
        return $this->hasMany('App\Product','category_id');
    }

    // filterable

    public function filterCode($query, $value)
    {
        return $query->where('code', 'LIKE', '%' . $value . '%');
    }
}
