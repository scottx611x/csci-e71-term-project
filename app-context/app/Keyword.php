<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    public function assets()
    {
        return $this->belongsToMany('App\Asset')->withTimestamps();
    }

    public static function getListForCheckboxes()
    {
        $keywords = Keyword::orderBy('name')->get();

        $keywordsForCheckboxes = [];

        foreach ($keywords as $keyword) {
            $keywordsForCheckboxes[$keyword['id']] = $keyword->name;
        }

        return $keywordsForCheckboxes;
    }
}
