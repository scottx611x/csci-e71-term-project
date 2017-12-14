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
            $computertypes = ComputerType::all();
            return view('computertype.list')->with(['computertypes' => $computertypes]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $computertype = ComputerType::findOrFail($n);
        return view('computertype.show')->with(['computertype' => $computertype]);
    }

    //Display the form to add a new computer type
    public function create(Request $request)
    {
        $computertype = new ComputerType();

        return view('computertype.create')->with(['computertype' => $computertype]);
    }

    // Process the form for adding a new computer type
    public function store(Request $request)
    {
        // validate input
        $this->validate($request, [
            'description' => 'required|max:50',
        ]);

        $computertype = new ComputerType();
        $computertype->description = $request->input('description');
        $computertype->save();

        # Redirect the user to the page to view the computer type
        return redirect('/computertype/'.$computertype->id)->with('alert', 'Computer Type '.$computertype->id.' was Added.');
    }

    // Process the form for editing an existing computer type
    public function edit($id)
    {
        $computertype = ComputerType::find($id);

        if (!$computertype) {
            return redirect('/computertype')->with('alert', 'Computer Type '.$id.' Not Found.');
        }

        return view('computertype.edit')->with(['computertype' => $computertype]);
    }

    // Process the form for updating an existing computer type
    public function update(Request $request, $id)
    {
        // validate input
        $this->validate($request, [
            'description' => 'required|max:50',
        ]);

        $computertype = ComputerType::find($id);

        $computertype->description = $request->input('description');

        $computertype->save();

        return redirect('/computertype/'.$id)->with('alert', 'Computer Type '.$id.' Saved.');
    }
}
