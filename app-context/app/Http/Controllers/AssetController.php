<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Computer;
use App\Group;
use App\Location;
use App\Vendor;
use App\Warranty;
use App\OutOfServiceCode;
use App\ComputerType;

class AssetController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = Asset::all();
            return view('asset.show')->with(['result' => $result]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Asset::findOrFail($n);

        return view('asset.show')->with(['result' => $result]);
    }

    //Display the form to add a new asset
    public function create(Request $request)
    {
        $result = new Asset();

        $groups = Group::orderBy('description', 'ASC')->get();
        $groupsForDropDown = $groups->pluck('description','id');
        $groupsForDropDown->all();

        $locations = Location::orderBy('description', 'ASC')->get();
        $locationsForDropDown = $locations->pluck('description','id');
        $locationsForDropDown->all();

        $vendors = Vendor::orderBy('company', 'ASC')->get();
        $vendorsForDropDown = $vendors->pluck('company','id');
        $vendorsForDropDown->all();

        $warranties = Warranty::orderBy('description', 'ASC')->get();
        $warrantiesForDropDown = $warranties->pluck('description','id');
        $warrantiesForDropDown->all();

        $outOfServiceCodes = OutOfServiceCode::orderBy('reason', 'ASC')->get();
        $outOfServiceCodesForDropDown = $outOfServiceCodes->pluck('reason','id');
        $outOfServiceCodesForDropDown->all();

        $computerTypes = ComputerType::orderBy('description', 'ASC')->get();
        $computerTypesForDropDown = $computerTypes->pluck('description','id');
        $computerTypesForDropDown->all();

        return view('asset.create')->with([
            'result' => $result,
            'groupsForDropDown' => $groupsForDropDown,
            'locationsForDropDown' => $locationsForDropDown,
            'vendorsForDropDown' => $vendorsForDropDown,
            'warrantiesForDropDown' => $warrantiesForDropDown,
            'outOfServiceCodesForDropDown' => $outOfServiceCodesForDropDown,
            'computerTypesForDropDown' => $computerTypesForDropDown,
        ]);
    }

    // Process the form for adding a new asset
    public function store(Request $request)
    {

        $this->validate($request, [
            'owner' => 'required|max:50',
            'description' => 'max:50',
            'notes' => 'max:191',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|max:50',
            'estimated_life_months' => 'required|numeric',
            'tag' => 'required|alphanum|max:10',
            'scheduled_retirement_year' => 'required|numeric',
            'assigned_to' => 'required|alpha|max:30',
            'assigned_date' => 'required|date',
            'group_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'vendor_id' => 'required|numeric',
            'warranty_id' => 'required|numeric',
        ]);

        if ($request->has('is_out_of_service')) {
            $this->validate($request, [
                'out_of_service_id' => 'required|numeric',
                'out_of_service_date' => 'required|date',
            ]);
        }

        if ($request->has('is_computer')) {
            $this->validate($request, [
                'computer_type_id' => 'required|numeric',
                'memory' => 'required|max:30',
                'model' => 'required|max:30',
                'operating_system' => 'required|max:30',
                'mac_address' => 'required|max:30',
            ]);
        }

        $asset = new Asset();
        $asset->owner = $request->input('owner');
        $asset->description = $request->input('description');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->tag = $request->input('tag');
        $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
        $asset->group_id = $request->input('group_id');
        $asset->location_id = $request->input('location_id');
        $asset->warranty_id = $request->input('warranty_id');
        $asset->vendor_id = $request->input('vendor_id');
        $asset->is_computer = $request->has('is_computer');
        $asset->is_out_of_service = $request->has('is_out_of_service');
        if ($request->has('is_out_of_service')) {
            $asset->out_of_service_id = $request->input('out_of_service_id');
            $asset->out_of_service_date = $request->input('out_of_service_date');
        }else {
            $asset->out_of_service_id = null;
            $asset->out_of_service_date = null;
        }
        $asset->save();

        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->id)->with('alert', 'Asset '.$asset->id.' was Added.');
    }

    public function edit($id)
    {
        $result = Asset::with([
            'computer',
            'group:id',
            'location:id',
            'vendor:id',
            'warranty:id',
            'outofservicecode:id'
            ])->find($id);

        if (!$result) {
            return redirect('/asset')->with('alert', 'Asset '.$id.' Not Found.');
        }

        $groups = Group::orderBy('description', 'ASC')->get();
        $groupsForDropDown = $groups->pluck('description','id');
        $groupsForDropDown->all();

        $locations = Location::orderBy('description', 'ASC')->get();
        $locationsForDropDown = $locations->pluck('description','id');
        $locationsForDropDown->all();

        $vendors = Vendor::orderBy('company', 'ASC')->get();
        $vendorsForDropDown = $vendors->pluck('company','id');
        $vendorsForDropDown->all();

        $warranties = Warranty::orderBy('description', 'ASC')->get();
        $warrantiesForDropDown = $warranties->pluck('description','id');
        $warrantiesForDropDown->all();

        $outOfServiceCodes = OutOfServiceCode::orderBy('reason', 'ASC')->get();
        $outOfServiceCodesForDropDown = $outOfServiceCodes->pluck('reason','id');
        $outOfServiceCodesForDropDown->all();

        $computerTypes = ComputerType::orderBy('description', 'ASC')->get();
        $computerTypesForDropDown = $computerTypes->pluck('description','id');
        $computerTypesForDropDown->all();

        return view('asset.edit')->with([
            'result' => $result,
            'groupsForDropDown' => $groupsForDropDown,
            'locationsForDropDown' => $locationsForDropDown,
            'vendorsForDropDown' => $vendorsForDropDown,
            'warrantiesForDropDown' => $warrantiesForDropDown,
            'outOfServiceCodesForDropDown' => $outOfServiceCodesForDropDown,
            'computerTypesForDropDown' => $computerTypesForDropDown,
        ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'owner' => 'required|max:50',
            'description' => 'max:50',
            'notes' => 'max:191',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|max:50',
            'estimated_life_months' => 'required|numeric',
            'tag' => 'required|alphanum|max:10',
            'scheduled_retirement_year' => 'required|numeric',
            'assigned_to' => 'required|alpha|max:30',
            'assigned_date' => 'required|date',
            'group_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'vendor_id' => 'required|numeric',
            'warranty_id' => 'required|numeric',
        ]);

        if ($request->has('is_out_of_service')) {
            $this->validate($request, [
                'out_of_service_id' => 'required|numeric',
                'out_of_service_date' => 'required|date',
            ]);
        }

        if ($request->has('is_computer')) {
            $this->validate($request, [
                'computer_type_id' => 'required|numeric',
                'memory' => 'required|max:30',
                'model' => 'required|max:30',
                'operating_system' => 'required|max:30',
                'mac_address' => 'required|max:30',
            ]);
        }

        $asset = Asset::find($id);

        $asset->owner = $request->input('owner');
        $asset->description = $request->input('description');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->tag = $request->input('tag');
        $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
        $asset->group_id = $request->input('group_id');
        $asset->location_id = $request->input('location_id');
        $asset->warranty_id = $request->input('warranty_id');
        $asset->vendor_id = $request->input('vendor_id');
        $asset->is_computer = $request->has('is_computer');
        $asset->is_out_of_service = $request->has('is_out_of_service');
        if ($request->has('is_out_of_service')) {
            $asset->out_of_service_id = $request->input('out_of_service_id');
            $asset->out_of_service_date = $request->input('out_of_service_date');
        }else {
            $asset->out_of_service_id = null;
            $asset->out_of_service_date = null;
        }
        $asset->save();

        $computer = Computer::where('asset_id', '=', $id)->first();

        if ( $computer) {
            $computer->delete();    // delete any related computer record
        }

        if ($asset->is_computer) {
            $computer = new Computer();
            $computer->asset_id = $asset->id;
            $computer->computer_type_id = $request->input('computer_type_id');
            $computer->memory = $request->input('memory');
            $computer->model = $request->input('model');
            $computer->operating_system = $request->input('operating_system');
            $computer->mac_address = $request->input('mac_address');
            $computer->save();
        }

        return redirect('/asset/'.$id)->with('alert', 'Asset '.$id.' Saved.');
    }

    public function delete($id)
    {
        $result = Asset::find($id);

        if (!$result) {
            return redirect('/asset')->with('alert', 'Asset '.$id.' is Not Found.');
        }

        $result->delete();
        return redirect('/')->with('alert', 'Asset '.$result->id.' Deleted.');
    }

}
