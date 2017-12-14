<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $locations = Location::all();
            return view('location.list')->with(['locations' => $locations]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $location = Location::findOrFail($n);
        return view('location.show')->with(['location' => $location]);
    }
}
