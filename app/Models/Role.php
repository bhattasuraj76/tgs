<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $primaryKey = 'id';
    protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];

    public function getAllData()
    {
        $roles = $this->query();
        return $roles->orderBy('id', 'desc')->get();
    }

    public function getPermissionsId()
    {
        return $this->permissions()->pluck('id')->toArray();
    }
}
