<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name', 'description', 'status', 'position'
    ];


    public function getAllData($inputData = [])
    {
        $data = $this->query();

        if (isset($inputData['name']) && !empty($inputData['name'])) {
            $data->where('name', 'LIKE', '%' . $inputData['name'] . '%');
        }

        if (isset($inputData['status']) && !empty($inputData['status'])) {
            $data->where('status', $inputData['status']);
        }

        return $data->orderBy('id', 'desc')->get();
    }


    public function tokens()
    {
        return $this->hasMany(Token::class, 'department_id', 'id');
    }

    public function workingdays()
    {
        return $this->hasMany(WorkingDay::class, 'department_id', 'id');
    }
}
