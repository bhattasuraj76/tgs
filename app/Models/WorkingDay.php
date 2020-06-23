<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    protected $table = 'working_days';

    protected $fillable = [
       'department_id', 'day', 'office_start_time', 'office_end_time', 'break_start_time', 'break_end_time', 'max_quotas', 'allocation_time', 'position'
    ];

    public function getAllData()
    {
        $data = $this->query();
        return $data->orderBy('id', 'DESC')->get();
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

}
