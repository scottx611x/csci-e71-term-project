<div class="form-group has-success row">
    <label for="owner" class="col-sm-2 col-form-label">Owner</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="owner" id="owner" value='{{ old('owner', $result->owner) }}' maxlength="50" placeholder="Owner">
        @if($errors->get('owner'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('owner') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="description" value='{{ old('description', $result->description) }}' maxlength="50" placeholder="Description">
        @if($errors->get('description'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('description') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="purchase_price" class="col-sm-2 col-form-label">Purchase Price</label>
    <div class="col-sm-10">
        <input type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price" value='{{ old('purchase_price', $result->purchase_price) }}' placeholder="Purchase Price">
        @if($errors->get('purchase_price'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('purchase_price') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="purchase_date" class="col-sm-2 col-form-label">Purchase Date</label>
    <div class="col-sm-10">
        <input type="date" step="0.01" class="form-control" name="purchase_date" id="purchase_date" value='{{ old('purchase_date', $result->purchase_date) }}' placeholder="Purchase Date">
        @if($errors->get('purchase_date'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('purchase_date') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="serial_number" class="col-sm-2 col-form-label">Serial Number</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="serial_number" id="serial_number" value='{{ old('serial_number', $result->serial_number) }}' maxlength="50" placeholder="Serial Number">
        @if($errors->get('serial_number'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('serial_number') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="notes" id="notes" value='{{ old('notes', $result->notes) }}' maxlength="191" placeholder="Notes">
        @if($errors->get('notes'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('notes') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="estimated_life_months" class="col-sm-2 col-form-label">Estimated life (months)</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="estimated_life_months" id="estimated_life_months" value='{{ old('estimated_life_months', $result->estimated_life_months) }}' placeholder="Estimated life (months)">
        @if($errors->get('estimated_life_months'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('estimated_life_months') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="assigned_to" class="col-sm-2 col-form-label">Assigned To</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="assigned_to" id="assigned_to" value='{{ old('assigned_to', $result->assigned_to) }}' maxlength="30" placeholder="Assigned To">
        @if($errors->get('assigned_to'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('assigned_to') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="assigned_date" class="col-sm-2 col-form-label">Assigned Date</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="assigned_date" id="assigned_date" value='{{ old('assigned_date', $result->assigned_date) }}' placeholder="Assigned Date">
        @if($errors->get('assigned_date'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('assigned_date') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="tag" id="tag" value='{{ old('tag', $result->tag) }}' maxlength="10" placeholder="Tag">
        @if($errors->get('tag'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('tag') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="assigned_date" class="col-sm-2 col-form-label">Scheduled Retirement Year</label>
    <div class="col-sm-10">
        <input type="number" class="form-control"  min="2017" max="9999" name='scheduled_retirement_year' id="scheduled_retirement_year" value='{{ old('scheduled_retirement_year', $result->scheduled_retirement_year) }}' placeholder="Scheduled Retirement Year">
        @if($errors->get('scheduled_retirement_year'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('scheduled_retirement_year') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="group_id" class="col-sm-2 col-form-label">Group</label>
    <div class="col-sm-10">
        <select name="group_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($groupsForDropDown->count())
            @foreach($groupsForDropDown as $key => $val)
            <option value="{{ $key }}" {{ old('group_id', isset($result->group->id) ? $result->group->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
            @endforeach
            @endif
        </select>
        @if($errors->get('group_id'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('group_id') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="location_id" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10">
        <select name="location_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($locationsForDropDown->count())
            @foreach($locationsForDropDown as $key => $val)
            <option value="{{ $key }}" {{ old('location_id', isset($result->location->id) ? $result->location->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
            @endforeach
            @endif
        </select>
        @if($errors->get('location_id'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('location_id') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="warranty_id" class="col-sm-2 col-form-label">Warranty</label>
    <div class="col-sm-10">
        <select name="warranty_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($warrantiesForDropDown->count())
            @foreach($warrantiesForDropDown as $key => $val)
            <option value="{{ $key }}" {{ old('warranty_id', isset($result->warranty->id) ? $result->warranty->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
            @endforeach
            @endif
        </select>
        @if($errors->get('warranty_id'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('warranty_id') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="vendor_id" class="col-sm-2 col-form-label">Vendor</label>
    <div class="col-sm-10">
        <select name="vendor_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($vendorsForDropDown->count())
            @foreach($vendorsForDropDown as $key => $val)
            <option value="{{ $key }}" {{ old('vendor_id', isset($result->vendor->id) ? $result->vendor->id : "") === $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
            @endforeach
            @endif
        </select>
        @if($errors->get('vendor_id'))
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->get('vendor_id') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">Is Out of Service?</div>
    <div class="col-sm-10">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name='is_out_of_service' id='is_out_of_service' onchange="showOutofserviceForm()" {{ old('is_out_of_service', $result->is_out_of_service) ? 'CHECKED' : '' }}>
                @if($errors->get('is_out_of_service'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('is_out_of_service') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </label>
        </div>
    </div>
</div>
<div  style="display: block;" id="outofservice_form">
    <fieldset class="form-group">
        <legend>Out Of Service Details</legend>
        <div class="form-group row">
            <label for="out_of_service_date" class="col-sm-2 col-form-label">Out of Service Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="out_of_service_date" id="out_of_service_date" value='{{ old('out_of_service_date', $result->out_of_service_date) }}' placeholder="Out of Service Date">
                @if($errors->get('out_of_service_date'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('out_of_service_date') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="out_of_service_id" class="col-sm-2 col-form-label">Out of Service Code</label>
            <div class="col-sm-10">
                <select name="out_of_service_id">
                    <option value="" selected="selected" disabled="disabled">Please choose one</option>
                    @if ($outOfServiceCodesForDropDown->count())
                    @foreach($outOfServiceCodesForDropDown as $key => $val)
                    <option value="{{ $key }}" {{ old('out_of_service_id', isset($result->outofservicecode->id) ? $result->outofservicecode->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                    @endforeach
                    @endif
                </select>
                @if($errors->get('out_of_service_id'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('out_of_service_id') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </fieldset>
</div>
<div class="form-group row">
    <div class="col-sm-2">Is Computer?</div>
    <div class="col-sm-10">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name='is_computer' id='is_computer' onchange="showComputerForm()" {{ old('is_computer', $result->is_computer) ? 'CHECKED' : '' }}>
                @if($errors->get('is_computer'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('is_computer') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </label>
        </div>
    </div>
</div>
<div  style="display: block;" id="computer_form">
    <fieldset class="form-group">
        <legend>Computer Details</legend>
        <div class="form-group row">
            <label for="memory" class="col-sm-2 col-form-label">Memory</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="memory" id="memory" value='{{ old('memory', isset($result->computer->memory) ? $result->computer->memory : "") }}' maxlength="30" placeholder="Memory">
                @if($errors->get('memory'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('memory') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="model" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="model" id="model" value='{{ old('model', isset($result->computer->model) ? $result->computer->model : "") }}' maxlength="30" placeholder="Model">
                @if($errors->get('model'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('model') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="operating_system" class="col-sm-2 col-form-label">Operating System</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="operating_system" id="operating_system" value='{{ old('operating_system', isset($result->computer->operating_system) ? $result->computer->operating_system : "") }}' maxlength="30" placeholder="Operating System">
                @if($errors->get('operating_system'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('operating_system') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="mac_address" class="col-sm-2 col-form-label">MAC Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mac_address" id="mac_address" value='{{ old('mac_address', isset($result->computer->mac_address) ? $result->computer->mac_address : "") }}' maxlength="30" placeholder="MAC Address">
                @if($errors->get('mac_address'))
                <ul class="alert alert-danger" role="alert">
                    @foreach($errors->get('mac_address') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </fieldset>
</div>
