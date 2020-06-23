<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
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
}
