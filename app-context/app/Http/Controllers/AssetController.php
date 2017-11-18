<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = Asset::all();
            //dump($result->toArray());
            return view('asset.show')->with(['result' => $result]);
            //return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Asset::findOrFail($n);
        //dump($result->toArray());

        return view('asset.show')->with(['result' => $result]);
    }

    //Display the form to add a new asset
    public function create(Request $request)
    {
        return view('asset.create');
    }

    // Process the form for adding a new asset
    public function store(Request $request)
    {
        $this->validate($request, [
            'owner' => 'required|max:50',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|alphanum',
            'estimated_life_months' => 'required|numeric',
            'assigned_to' => 'required|alpha',
            'assigned_date' => 'required|date',
        ]);
        

        $asset = new Asset();
        $asset->owner = $request->input('owner');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->save();

        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->$id)->with('alert', 'Your asset was added.');
    }
}
