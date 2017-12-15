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
use App\Keyword;

class AssetController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $assets = Asset::with('keywords')->get();
            return view('asset.listall')->with(['assets' => $assets]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $asset = Asset::with('keywords')->findOrFail($n);
        return view('asset.show')->with(['asset' => $asset]);
    }

    //Display the form to add a new asset
    public function create(Request $request)
    {
        $asset = new Asset();

        // set default values
        $asset->quantity = 1;
        $asset->owner = 'Alpine Academy';
        $keywordIdsForThisAsset=[];

        return view('asset.create')->with([
            'asset' => $asset,
            'keywordIdsForThisAsset' => $keywordIdsForThisAsset,
            'keywordsForCheckboxes' => Keyword::getListForCheckboxes(),
            'groupsForDropdown' => Group::getListForDropdown(),
            'locationsForDropdown' => Location::getListForDropdown(),
            'vendorsForDropdown' => Vendor::getListForDropdown(),
            'warrantiesForDropdown' => Warranty::getListForDropdown(),
            'outOfServiceCodesForDropdown' => OutOfServiceCode::getListForDropdown(),
            'computerTypesForDropdown' => ComputerType::getListForDropdown(),
        ]);
    }

    // Process the form for adding a new asset
    public function store(Request $request)
    {
        // validate input
        $this->validateInput($request);

        $asset = new Asset();
        $asset->owner = $request->input('owner');
        $asset->description = $request->input('description');
        $asset->quantity = $request->input('quantity');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->funding_source = $request->input('funding_source');
        $asset->percent_federal_participation = $request->input('percent_federal_participation');
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

        // first save the new record, so the generated primary key (id) will be used for asset_keyword and computers table entries
        $asset->save();

        //sync asset with any keywords
        $asset->keywords()->sync($request->input('keywords'));

        // if Asset is computer then add Computer table entry
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

        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->id)->with('alert', 'Asset '.$asset->id.' was Added.');
    }

    // Process the form for editing an existing asset
    public function edit($id)
    {
        $asset = Asset::with([
            'keywords',
            'computer',
            'group:id',
            'location:id',
            'vendor:id',
            'warranty:id',
            'outofservicecode:id'
            ])->find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' Not Found.');
            }

            $keywordIdsForThisAsset = $asset->keywords->pluck('id')->all();

            return view('asset.edit')->with([
                'asset' => $asset,
                'keywordIdsForThisAsset' => $keywordIdsForThisAsset,
                'keywordsForCheckboxes' => Keyword::getListForCheckboxes(),
                'groupsForDropdown' => Group::getListForDropdown(),
                'locationsForDropdown' => Location::getListForDropdown(),
                'vendorsForDropdown' => Vendor::getListForDropdown(),
                'warrantiesForDropdown' => Warranty::getListForDropdown(),
                'outOfServiceCodesForDropdown' => OutOfServiceCode::getListForDropdown(),
                'computerTypesForDropdown' => ComputerType::getListForDropdown(),
            ]);
        }

        public function export($id = null)
        {
            dump("test");
            // $headers = array(
            //     'Content-Type' => 'text/csv',
            //     'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            //     'Content-Disposition' => 'attachment; filename=data.csv',
            //     'Expires' => '0',
            //     'Pragma' => 'public'
            // );
            
            // if (is_null($id)) {
            //     // Export all
            //     $list = Asset::all()->toArray();
            //     array_unshift($list, array_keys($list[0]));

            //     $callback = function() use ($list)
            //     {
            //         $FH = fopen('php://output', 'w');
            //         foreach ($list as $row) {
            //             fputcsv($FH, $row);
            //         }
            //         fclose($FH);
            //     };
    
            //     return Response::stream($callback, 200, $headers);
            // }
            // else {
            //     // Export $id
            //     $asset = Asset::findOrFail($id);

            //     $callback = function() use ($asset)
            //     
            //         $FH = fopen('php://output', 'w');
            //         fputcsv($FH, $asset);
            //         fclose($FH);
            //     };
    
            //     return Response::stream($callback, 200, $headers);
            // }

           
        }

        // Process the form for updating an existing asset
        public function update(Request $request, $id)
        {
            // validate input
            $this->validateInput($request);

            $asset = Asset::with('keywords')->find($id);

            $asset->owner = $request->input('owner');
            $asset->description = $request->input('description');
            $asset->quantity = $request->input('quantity');
            $asset->purchase_price = $request->input('purchase_price');
            $asset->purchase_date = $request->input('purchase_date');
            $asset->funding_source = $request->input('funding_source');
            $asset->percent_federal_participation = $request->input('percent_federal_participation');
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

            // sync asset with any keywords
            $asset->keywords()->sync($request->input('keywords'));

            $asset->save();

            // find and delete any related computer record
            $computer = Computer::where('asset_id', '=', $id)->first();
            if ( $computer) {
                $computer->delete();
            }

            // if Asset is computer then add Computer table entry
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

        /*
        * Validate input fields, submitted by Create or Edit forms
        */
        private function validateInput(Request $request)
        {

            if (empty($request['vendor_id']) || $request['vendor_id'] == '') {
                $request['vendor_id'] = null;
            } else {
                $this->validate($request, [
                    'vendor_id' => 'numeric',
                ]);
            }

            if (empty($request['warranty_id']) || $request['warranty_id'] == '') {
                $request['warranty_id'] = null;
            }else {
                $this->validate($request, [
                    'warranty_id' => 'numeric',
                ]);
            }

            $this->validate($request, [
                'owner' => 'required|max:50',
                'description' => 'max:50',
                'quantity' => 'required|min:1|max:100',
                'notes' => 'max:191',
                'purchase_price' => 'required|numeric',
                'purchase_date' => 'required|date',
                'funding_source' => 'required|max:50',
                'percent_federal_participation' => 'between:0,99.99',
                'serial_number' => 'max:50',
                'estimated_life_months' => 'required|numeric',
                'tag' => 'max:10',
                'scheduled_retirement_year' => 'required|numeric',
                'assigned_to' => 'required|alpha|max:30',
                'assigned_date' => 'required|date',
                'group_id' => 'required|numeric',
                'location_id' => 'required|numeric',
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
        }

        /*
        * Asks user to confirm they actually want to delete the assetk
        * GET
        * /asset/{id}/delete
        */
        public function delete($id)
        {
            $asset = Asset::find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' is Not Found.');
            }

            return view('asset.delete')->with([
                'asset' => $asset,
                'previousUrl' => url()->previous() == url()->current() ? '/asset' : url()->previous(),
            ]);
        }

        /*
        * Actually deletes the asset
        * DELETE
        * /asset/{id}/delete
        */
        public function destroy($id)
        {
            $asset = Asset::find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' is Not Found.');
            }

            $asset->keywords()->detach();
            $asset->delete();
            return redirect('/')->with('alert', 'Asset '.$asset->id.' Deleted.');
        }

        /*
        * Search for an asset by some search string
        * GET
        * /asset/search
        */
        public function search(Request $request)
        {
/////// Check for export paramter and process


            $assets = [];
            $alertMsg = "";

            // if search by id
            if(isset($_GET['submitbtn']) && ($_GET['submitbtn'] == "submit-search-by-id"))
            {
                if (isset($_GET['id_search_input']) && !empty($_GET['id_search_input'])) {
                    $result = Asset::with('keywords')->find($_GET['id_search_input']);

                    if($result) $assets[] = $result;
                } else {
                    $alertMsg = "No Id provided for search";
                }

                return view('asset.search')->with(['assets' => $assets,
                    'alertMsg' => $alertMsg,
                    'id_search_input' => isset($_GET['id_search_input']) ? $_GET['id_search_input'] : '',
                    'description_search_input' => isset($_GET['description_search_input']) ? $_GET['description_search_input'] : '',
                    'funding_source_search_input' => isset($_GET['funding_source_search_input']) ? $_GET['funding_source_search_input'] : '',
                    'assigned_to_search_input' => isset($_GET['assigned_to_search_input']) ? $_GET['assigned_to_search_input'] : '',
                    'owner_search_input' => isset($_GET['owner_search_input']) ? $_GET['owner_search_input'] : ''
                ]);
            }

            // if advanced search. If no search string entered then return to search viewport
            $searchFieldsCount = 0;    // Number of search fields used

            // Run search criteria based on provided search fields
            $results = Asset::with('keywords');
            foreach( $_GET as $key => $val)
            {
                switch ( $key ) {
                    case 'description_search_input':
                    if (!empty($val)) {
                        $searchFieldsCount++;
                        $results->where('description','like','%'.$val.'%');
                    }
                    break;
                    case 'funding_source_search_input':
                    if (!empty($val)) {
                        $searchFieldsCount++;
                        $results->where('funding_source','like','%'.$val.'%');
                    }
                    break;
                    case 'assigned_to_search_input':
                    if (!empty($val)) {
                        $searchFieldsCount++;
                        $results->where('assigned_to','like','%'.$val.'%');
                    }
                    break;
                    case 'owner_search_input':
                    if (!empty($val)) {
                        $searchFieldsCount++;
                        $results->where('owner','like','%'.$val.'%');
                    }
                    break;
                    default:
                }
            }

            if ($searchFieldsCount > 0) {
                $assets = $results->get(); // execute search
            } else {
                $alertMsg = "No Advanced Search criteria provided";
            }

            return view('asset.search')->with(['assets' => $assets,
                'alertMsg' => $alertMsg,
                'id_search_input' => isset($_GET['id_search_input']) ? $_GET['id_search_input'] : '',
                'description_search_input' => isset($_GET['description_search_input']) ? $_GET['description_search_input'] : '',
                'funding_source_search_input' => isset($_GET['funding_source_search_input']) ? $_GET['funding_source_search_input'] : '',
                'assigned_to_search_input' => isset($_GET['assigned_to_search_input']) ? $_GET['assigned_to_search_input'] : '',
                'owner_search_input' => isset($_GET['owner_search_input']) ? $_GET['owner_search_input'] : ''
            ]);
    }
}
