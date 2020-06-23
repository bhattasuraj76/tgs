<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name',  'link', 'order', 'location', 'position', 'status'];

    public function menuitems()
    {
        return $this->hasMany(MenuItem::class, 'menu', 'id');
    }

    public function getAllData()
    {
        $menus = $this->query();
        return $menus->orderBy('id', 'asc')->get();
    }

    public static function byTitle($title)
    {
        return self::where('title', '=', $title)->first();
    }
}
