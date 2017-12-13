<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $groups = Group::all();
            return view('group.list')->with(['groups' => $groups]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $group = Group::findOrFail($n);
        return view('group.show')->with(['group' => $group]);
    }
}
