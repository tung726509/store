<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Tag extends Model
{
    protected $table = 'tags';

    use Filterable;

    protected $fillable = [
        'code', 'pretty_name', 'created_at','created_by','updated_at','updated_by'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product','product_tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    // filterable

    public function filterName($query, $value)
    {
        return $query->where('pretty_name', 'LIKE', '%' . $value . '%');
    }
}
