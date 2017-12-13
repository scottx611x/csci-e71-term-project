<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $vendors = Vendor::all();
            return view('vendor.list')->with(['vendors' => $vendors]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $vendor = Vendor::findOrFail($n);
        return view('vendor.show')->with(['vendor' => $vendor]);
    }
}
