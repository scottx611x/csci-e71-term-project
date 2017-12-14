<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRepair extends Model
{
    protected $table = 'asset_repairs';

    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
}
