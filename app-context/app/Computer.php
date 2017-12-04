<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $primaryKey = 'asset_id';

    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }

    public function computertype()
    {
        return $this->belongsTo('App\ComputerType','computer_type_id');
    }
}
