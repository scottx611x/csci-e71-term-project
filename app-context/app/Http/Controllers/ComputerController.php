<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;

class ComputerController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $computers = Computer::all();
            return view('computer.list')->with(['computers' => $computers]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $computer = Computer::where('asset_id', '=', $n)->firstOrFail();
        return view('computer.show')->with(['computer' => $computer]);
    }
}
