<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetRepair;

class AssetRepairController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = AssetRepair::all();
            // dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = AssetRepair::where('asset_id', '=', $n)->get();;
        // dump($result->toArray());
    }
}
