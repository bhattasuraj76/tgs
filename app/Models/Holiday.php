<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holiday extends Model
{
    protected $table = 'holidays';

    protected $fillable = [
        'date', 'remarks', 'status'
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

        //check for year
        if (isset($inputData['year']) && !empty($inputData['year'])) {
            $data->whereYear('date',  $inputData['year']);
        }

        return $data->orderBy('id', 'DESC')->get();
    }

    public function getDateAttribute($value)
    {
        return (new Carbon($value))->format('Y-m-d');
    }
}
