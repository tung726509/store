<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as PackageRole;

class Role extends PackageRole
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'pretty_name', 'guard','css','created_at','updated_at'
    ];
}
