<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'slug', 'description', 'short_description', 'image', 'image_alt',  'meta_title', 'meta_description', 'meta_keywords', 'status'];

    public function getAllData($inputData = [])
    {
        $data = $this->query();
        if (isset($inputData['status']) && !empty($inputData['status']))
            $data->where('status', $inputData['status']);
        return $data->orderBy('id', 'desc')->get();
    }
}
