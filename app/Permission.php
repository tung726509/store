<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
use Spatie\Permission\Models\Permission as PackagePermission;

class Permission extends PackagePermission
{
    protected $table = 'permissions';

    use Filterable;

    protected $fillable = [
        'name', 'pretty_name','guard_name','created_at','updated_at'
    ];
}
