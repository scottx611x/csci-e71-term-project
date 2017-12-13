<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warranty;

class WarrantyController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $warranties = Warranty::all();
            return view('warranty.list')->with(['warranties' => $warranties]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $warranty = Warranty::findOrFail($n);
        return view('warranty.show')->with(['warranty' => $warranty]);
    }
}
