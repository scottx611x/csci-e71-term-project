<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComputerType;

class ComputerTypeController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = ComputerType::all();
            dump($result->toArray());
            return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = ComputerType::findOrFail($n);
        dump($result->toArray());
    }
}
