<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputerType extends Model
{
    protected $table = 'computer_types';

    public function computer()
    {
        return $this->hasOne('App\Computer');
    }

    public static function getListForDropdown()
    {
        $computerTypes = ComputerType::orderBy('description', 'ASC')->get();
        $computerTypesForDropdown = $computerTypes->pluck('description','id');
        $computerTypesForDropdown->all();

        return $computerTypesForDropdown;
    }
}
