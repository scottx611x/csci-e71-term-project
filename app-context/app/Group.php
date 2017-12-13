<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public static function getListForDropdown()
    {
        $groups = Group::orderBy('description', 'ASC')->get();
        $groupsForDropdown = $groups->pluck('description','id');
        $groupsForDropdown->all();

        return $groupsForDropdown;
    }
}
