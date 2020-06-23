<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'logs';

    protected $fillable = ['module', 'subject', 'email'];

    public function getAllData()
    {
        $logs = $this->query();
        return $logs->orderBy('id', 'DESC')->get();
    }
}
