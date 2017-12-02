<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function assetrepairs()
    {
        return $this->hasMany('App\AssetRepair');
    }

    public function computer()
    {
        return $this->hasOne('App\Computer');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function warranty()
    {
        return $this->belongsTo('App\Warranty');
    }

    public function outofservicecode()
    {
        return $this->belongsTo('App\OutOfServiceCode','out_of_service_id');
    }
}
