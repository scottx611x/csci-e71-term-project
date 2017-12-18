<p><i class="fa fa-asterisk" aria-hidden="true"></i>-> indicates required fields</p>

<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="description" value='{{ old('description', $asset->description) }}' maxlength="50" placeholder="Description" required="required">
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
    <label for="purchase_price" class="col-sm-2 col-form-label">Quantity<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="number"  min="1" max="1000" class="form-control" name="quantity" id="quantity" value='{{ old('quantity', $asset->quantity) }}' placeholder="Quantity" required="required">
        @if($errors->get('quantity'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('quantity') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="purchase_price" class="col-sm-2 col-form-label">Purchase Price<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price" value='{{ old('purchase_price', $asset->purchase_price) }}' placeholder="Purchase Price" required="required">
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
    <label for="purchase_date" class="col-sm-2 col-form-label">Purchase Date<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="date" step="0.01" class="form-control" name="purchase_date" id="purchase_date" value='{{ old('purchase_date', $asset->purchase_date) }}' placeholder="Purchase Date (YYYY-MM-DD)" required="required">
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
    <label for="funding_source" class="col-sm-2 col-form-label">Funding Source<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="funding_source" id="funding_source" value='{{ old('funding_source', $asset->funding_source) }}' maxlength="50" placeholder="Funding Source" required="required">
        @if($errors->get('funding_source'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('funding_source') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="purchase_price" class="col-sm-2 col-form-label">Federal Participation (%)</label>
    <div class="col-sm-10">
        <input type="number" step="0.01" min="0" max="100" class="form-control" name="percent_federal_participation" id="percent_federal_participation" value='{{ old('percent_federal_participation', $asset->percent_federal_participation) }}' placeholder="Federal Participation (%)">
        @if($errors->get('percent_federal_participation'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('percent_federal_participation') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="serial_number" class="col-sm-2 col-form-label">Serial Number</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="serial_number" id="serial_number" value='{{ old('serial_number', $asset->serial_number) }}' maxlength="50" placeholder="Serial Number">
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
        <input type="text" class="form-control" name="notes" id="notes" value='{{ old('notes', $asset->notes) }}' maxlength="191" placeholder="Notes">
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
    <label for="estimated_life_months" class="col-sm-2 col-form-label">Estimated life (months)<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="estimated_life_months" id="estimated_life_months" value='{{ old('estimated_life_months', $asset->estimated_life_months) }}' placeholder="Estimated life (months)">
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
    <label for="assigned_to" class="col-sm-2 col-form-label">Assigned To<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="assigned_to" id="assigned_to" value='{{ old('assigned_to', $asset->assigned_to) }}' maxlength="30" placeholder="Assigned To" required="required">
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
    <label for="assigned_date" class="col-sm-2 col-form-label">Assigned Date<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="assigned_date" id="assigned_date" value='{{ old('assigned_date', $asset->assigned_date) }}' placeholder="Assigned Date (YYYY-MM-DD)" required="required">
        @if($errors->get('assigned_date'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('assigned_date') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div class="form-group has-success row">
    <label for="owner" class="col-sm-2 col-form-label">Owner<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="owner" id="owner" value='{{ old('owner', $asset->owner) }}' maxlength="50" placeholder="Owner" required="required">
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
    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="tag" id="tag" value='{{ old('tag', $asset->tag) }}' maxlength="10" placeholder="Tag">
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
    <label for="assigned_date" class="col-sm-2 col-form-label">Scheduled Retirement Year<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="number" class="form-control"  min="2017" max="9999" name='scheduled_retirement_year' id="scheduled_retirement_year" value='{{ old('scheduled_retirement_year', $asset->scheduled_retirement_year) }}' placeholder="Scheduled Retirement Year" required="required">
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
    <label for="group_id" class="col-sm-2 col-form-label">Group<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <select name="group_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($groupsForDropdown->count())
                @foreach($groupsForDropdown as $key => $val)
                    <option value="{{ $key }}" {{ old('group_id', isset($asset->group->id) ? $asset->group->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                @endforeach
            @endif
        </select>
        <a href="{{ URL::to('group') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
    <label for="location_id" class="col-sm-2 col-form-label">Location<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <select name="location_id">
            <option value="" selected="selected" disabled="disabled">Please choose one</option>
            @if ($locationsForDropdown->count())
                @foreach($locationsForDropdown as $key => $val)
                    <option value="{{ $key }}" {{ old('location_id', isset($asset->location->id) ? $asset->location->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                @endforeach
            @endif
        </select>
        <a href="{{ URL::to('location') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
            <option value="" selected="selected">Please choose one</option>
            @if ($warrantiesForDropdown->count())
                @foreach($warrantiesForDropdown as $key => $val)
                    <option value="{{ $key }}" {{ old('warranty_id', isset($asset->warranty->id) ? $asset->warranty->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                @endforeach
            @endif
        </select>
        <a href="{{ URL::to('warranty') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
            <option value="" selected="selected">Please choose one</option>
            @if ($vendorsForDropdown->count())
                @foreach($vendorsForDropdown as $key => $val)
                    <option value="{{ $key }}" {{ old('vendor_id', isset($asset->vendor->id) ? $asset->vendor->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                @endforeach
            @endif
        </select>
        <a href="{{ URL::to('vendor') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
                <input class="form-check-input" type="checkbox" name='is_out_of_service' id='is_out_of_service' onchange="showOutofserviceForm()" {{ old('is_out_of_service', $asset->is_out_of_service) ? 'CHECKED' : '' }}> (Y/N)
            </label>
        </div>
        @if($errors->get('is_out_of_service'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('is_out_of_service') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div  style="display: block;" id="outofservice_form">
    <div class="card card-outline-primary mb-3 text-center">
        <div class="card-header"> Out of Service Details </div>
        <div class="card-block">
            <div class="form-group row">
                <label for="out_of_service_date" class="col-sm-2 col-form-label">Out of Service Date<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="out_of_service_date" id="out_of_service_date" value='{{ old('out_of_service_date', $asset->out_of_service_date) }}' placeholder="Out of Service Date">
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
                <label for="out_of_service_id" class="col-sm-2 col-form-label">Out of Service Code<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <select name="out_of_service_id">
                        <option value="" selected="selected" disabled="disabled">Please choose one</option>
                        @if ($outOfServiceCodesForDropdown->count())
                            @foreach($outOfServiceCodesForDropdown as $key => $val)
                                <option value="{{ $key }}" {{ old('out_of_service_id', isset($asset->outofservicecode->id) ? $asset->outofservicecode->id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                            @endforeach
                        @endif
                    </select>
                    <a href="{{ URL::to('outofservicecode') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                    @if($errors->get('out_of_service_id'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('out_of_service_id') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">Is Computer?</div>
    <div class="col-sm-10">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name='is_computer' id='is_computer' onchange="showComputerForm()" {{ old('is_computer', $asset->is_computer) ? 'CHECKED' : '' }}> (Y/N)
            </label>
        </div>
        @if($errors->get('is_computer'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('is_computer') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<div  style="display: block;" id="computer_form">
    <div class="card card-outline-primary mb-3 text-center">
        <div class="card-header"> Computer Details </div>
        <div class="card-block">
            <div class="form-group row">
                <label for="computer_type_id" class="col-sm-2 col-form-label">Computer Type<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <select name="computer_type_id">
                        <option value="" selected="selected" disabled="disabled">Please choose one</option>
                        @if ($computerTypesForDropdown->count())
                            @foreach($computerTypesForDropdown as $key => $val)
                                <option value="{{ $key }}" {{ old('computer_type_id', isset($asset->computer->computer_type_id) ? $asset->computer->computer_type_id : "") == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                            @endforeach
                        @endif
                    </select>
                    <a href="{{ URL::to('computertype') }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                    @if($errors->get('computer_type_id'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('computer_type_id') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="memory" class="col-sm-2 col-form-label">Memory<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="memory" id="memory" value='{{ old('memory', isset($asset->computer->memory) ? $asset->computer->memory : "") }}' maxlength="30" placeholder="Memory">
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
                <label for="model" class="col-sm-2 col-form-label">Model<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="model" id="model" value='{{ old('model', isset($asset->computer->model) ? $asset->computer->model : "") }}' maxlength="30" placeholder="Model">
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
                <label for="operating_system" class="col-sm-2 col-form-label">Operating System<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="operating_system" id="operating_system" value='{{ old('operating_system', isset($asset->computer->operating_system) ? $asset->computer->operating_system : "") }}' maxlength="30" placeholder="Operating System">
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
                <label for="mac_address" class="col-sm-2 col-form-label">MAC Address<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mac_address" id="mac_address" value='{{ old('mac_address', isset($asset->computer->mac_address) ? $asset->computer->mac_address : "") }}' maxlength="30" placeholder="MAC Address">
                    @if($errors->get('mac_address'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('mac_address') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
