<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $primaryKey = 'id';
    protected $table = 'permissions';

    protected $fillable = ['name', 'display_name', 'description'];

    public function getAllData()
    {
        $data = $this->query();
        return $data->orderBy('id', 'asc')->get();
    }
}
