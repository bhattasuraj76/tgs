<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Employee extends Authenticatable
{
    use LaratrustUserTrait;

    protected $table = "employees";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAllData()
    {
        $data = $this->query();
        return $data->orderBy('id', 'DESC')->get();
    }

    public function hashPassword($value)
    {
        return \Hash::make($value);
    }

    public function getRolesId()
    {
        return $this->roles()->pluck('id')->toArray();
    }
}
