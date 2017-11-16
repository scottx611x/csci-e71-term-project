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
            $result = Warranty::all();
            dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Warranty::findOrFail($n);
        dump($result->toArray());
    }
}
