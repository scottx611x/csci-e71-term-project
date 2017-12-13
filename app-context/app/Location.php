<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public static function getListForDropdown()
    {
        $locations = Location::orderBy('description', 'ASC')->get();
        $locationsForDropdown = $locations->pluck('description','id');
        $locationsForDropdown->all();

        return $locationsForDropdown;
    }
}
