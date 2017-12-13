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
            $assetrepairs = AssetRepair::orderBy('asset_id')->orderBy('repair_date')->get();
            return view('assetrepairs.list')->with(['assetrepairs' => $assetrepairs]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $assetrepairs = AssetRepair::where('asset_id', '=', $n)->orderBy('repair_date')->get();;
        return view('assetrepairs.list')->with(['assetrepairs' => $assetrepairs]);
    }
}
