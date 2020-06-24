<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Token extends Model
{
    protected $table = 'tokens';

    protected $fillable = [
        'department_id', 'date', 'time_slot', 'identifier', 'first_name', 'last_name', 'email', 'phone', 'status'
    ];

    protected $casts = [
        'date' => 'date:Y-m-d'
    ];

    public function getAllData($inputData = [])
    {
        $data = $this->query();
        //check for status
        if (isset($inputData['status']) && !empty($inputData['status']))
            $data->where('status', $inputData['status']);

        //check for department
        if (isset($inputData['department']) && !empty($inputData['department'])) {
            $data->where('department_id',  $inputData['department']);
        }

        return $data->orderBy('id', 'DESC')->get();
    }

    public function getDateAttribute($value)
    {
        return (new Carbon($value))->format('Y-m-d');
    }

    public function getPrettyTimeSlotAttribute()
    {
        return date("g:i a", strtotime($this->attributes['time_slot']));
    }

    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . " " . $this->attributes['last_name'];
    }

    public function getDepartmentNameAttribute()
    {
       return $this->department_id ? Department::find($this->department_id)->name : "N/A";
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
