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
            $result = OutOfServiceCode::all();
            dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = OutOfServiceCode::findOrFail($n);
        dump($result->toArray());
    }
}
