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

    private function validateAsset($requestData) {
        $this->validate($requestData, [
            'owner' => 'required|max:50',
            'description' => 'required|max:50',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|alphanum',
            'estimated_life_months' => 'required|numeric',
            'assigned_to' => 'required|alpha|max:30',
            'assigned_date' => 'required|date',
            'tag' => 'required|alphanum|max:20',
            'scheduled_retirement_year' => 'required|numeric'
        ]);
    }
    private function createAsset($requestData)
    {
        $asset = new Asset();
        $asset->owner = $requestData->input('owner');
        $asset->description = $requestData->input('description');
        $asset->purchase_price = $requestData->input('purchase_price');
        $asset->purchase_date = $requestData->input('purchase_date');
        $asset->serial_number = $requestData->input('serial_number');
        $asset->estimated_life_months = $requestData->input('estimated_life_months');
        $asset->assigned_to = $requestData->input('assigned_to');
        $asset->assigned_date = $requestData->input('assigned_date');
        $asset->tag = $requestData->input('tag');
        $asset->scheduled_retirement_year = $requestData->input('scheduled_retirement_year');
        $asset->save();

        return $asset;
    }
    // Process the form for adding a new asset
    public function store(Request $request)
    {
        $this->validateAsset($request);
        $asset = $this->createAsset($request);

        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->id)->with('alert', 'Your asset was added.');
    }
}
