<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OutOfServiceCode;

class OutOfServiceCodeController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $outofservicecodes = OutOfServiceCode::all();
            return view('outofservicecode.list')->with(['outofservicecodes' => $outofservicecodes]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $outofservicecode = OutOfServiceCode::findOrFail($n);
        return view('outofservicecode.show')->with(['outofservicecode' => $outofservicecode]);
    }
}
