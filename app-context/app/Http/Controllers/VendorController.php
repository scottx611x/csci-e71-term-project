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
            $result = Vendor::all();
            dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Vendor::findOrFail($n);
        dump($result->toArray());
    }
}
