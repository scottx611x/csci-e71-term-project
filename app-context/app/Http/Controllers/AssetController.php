<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = Asset::all();
            dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Asset::findOrFail($n);
        //dump($result->toArray());

        return view('asset.show');
    }
}
