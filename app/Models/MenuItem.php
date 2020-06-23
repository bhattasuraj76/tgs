<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    protected $table = 'menu_items';
    protected $fillable = ['label', 'link', 'parent', 'sort', 'menu', 'depth', 'status'];

    public function getsons($id)
    {
        return $this->where("parent", $id)->get();
    }

    public function getall($id)
    {
        return $this->where("menu", $id)->orderBy("sort", "asc")->get();
    }

    public static function getNextSortRoot($menu)
    {
        // return self::where('menu', $menu)->max('sort') + 1;
        return self::max('sort') + 1;
    }

    //self relation
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent', 'id')->orderBy('sort', 'asc');
    }
}
