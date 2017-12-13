
<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9">{{ $asset->id }}</dd>

    @if (count($asset->assetrepairs)>=1)
        <dt class="col-sm-3">Repairs</dt>
        <dd class="col-sm-9">{{ count($asset->assetrepairs) }}<a href="{{ URL::to('assetrepairs/'. $asset->id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>
    @endif
    
    <dt class="col-sm-3">Quantity</dt>
    <dd class="col-sm-9">{{ $asset->quantity }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $asset->description }}</dd>

    <dt class="col-sm-3">Purchase Price</dt>
    <dd class="col-sm-9">{{ $asset->purchase_price }}</dd>

    <dt class="col-sm-3">Purchase Date</dt>
    <dd class="col-sm-9">{{ $asset->purchase_date }}</dd>

    <dt class="col-sm-3">Funding Source</dt>
    <dd class="col-sm-9">{{ $asset->funding_source }}</dd>

    <dt class="col-sm-3">Federal Participation (%)</dt>
    <dd class="col-sm-9">{{ $asset->percent_federal_participation or "N/A" }}</dd>

    <dt class="col-sm-3">Serial Number</dt>
    <dd class="col-sm-9">{{ $asset->serial_number or "N/A"}}</dd>

    <dt class="col-sm-3">Notes</dt>
    <dd class="col-sm-9">{{ $asset->notes }}</dd>

    <dt class="col-sm-3">Estimated life (months)</dt>
    <dd class="col-sm-9">{{ $asset->estimated_life_months }}</dd>

    <dt class="col-sm-3">Assigned To</dt>
    <dd class="col-sm-9">{{ $asset->assigned_to }}</dd>

    <dt class="col-sm-3">Assigned Date</dt>
    <dd class="col-sm-9">{{ $asset->assigned_date }}</dd>

    <dt class="col-sm-3">Owner</dt>
    <dd class="col-sm-9">{{ $asset->owner }}</dd>

    <dt class="col-sm-3">Tag</dt>
    <dd class="col-sm-9">{{ $asset->tag or "N/A"}}</dd>

    <dt class="col-sm-3">Scheduled Retirement Year</dt>
    <dd class="col-sm-9">{{ $asset->scheduled_retirement_year }}</dd>

    <dt class="col-sm-3">Group</dt>
    <dd class="col-sm-9">{{ $asset->group->description }} <a href="{{ URL::to('group/'. $asset->group_id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>

    <dt class="col-sm-3">Location</dt>
    @if ($asset->location_id)
        <dd class="col-sm-9">{{ $asset->location->description }} <a href="{{ URL::to('location/'. $asset->location_id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>
    @else
        <dd class="col-sm-9">{{ "N/A" }}</dd>
    @endif

    <dt class="col-sm-3">Warranty</dt>
    @if ($asset->warranty_id)
        <dd class="col-sm-9">{{ $asset->warranty->description }} <a href="{{ URL::to('warranty/'. $asset->warranty_id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>
    @else
        <dd class="col-sm-9">{{ "N/A" }}</dd>
    @endif

    <dt class="col-sm-3">Vendor</dt>
    @if ($asset->vendor_id)
        <dd class="col-sm-9">{{ $asset->vendor->company }} <a href="{{ URL::to('vendor/'. $asset->vendor_id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>
    @else
        <dd class="col-sm-9">{{ "N/A" }}</dd>
    @endif

    <dt class="col-sm-3">Is Out of Service?</dt>
    <dd class="col-sm-9">{{ $asset->is_out_of_service ? "Yes" : "No" }}</dd>

    @if ($asset->is_out_of_service)
        <dt class="col-sm-3">Out of Service Date</dt>
        <dd class="col-sm-9">{{ $asset->out_of_service_date }}</dd>

        <dt class="col-sm-3">Out of Service Code</dt>
        <dd class="col-sm-9">{{ $asset->outofservicecode->reason }}</dd>
    @endif

    <dt class="col-sm-3">Is Computer?</dt>
    <dd class="col-sm-9">{{ $asset->is_computer ? "Yes" : "No" }}</dd>

    @if ($asset->is_computer)
        <dt class="col-sm-3">Computer Type</dt>
        <dd class="col-sm-9">{{ $asset->computer->computertype->description  }} <a href="{{ URL::to('computertype/'. $asset->computer->computer_type_id) }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></dd>

        <dt class="col-sm-3">Memory</dt>
        <dd class="col-sm-9">{{ $asset->computer->memory }}</dd>

        <dt class="col-sm-3">Model</dt>
        <dd class="col-sm-9">{{ $asset->computer->model }}</dd>

        <dt class="col-sm-3">Operating System</dt>
        <dd class="col-sm-9">{{ $asset->computer->operating_system }}</dd>

        <dt class="col-sm-3">MAC Address</dt>
        <dd class="col-sm-9">{{ $asset->computer->mac_address }}</dd>
    @endif

    <dt class="col-sm-3">Keywords</dt>
    <dd class="col-sm-9">{{ implode(', ', $asset->keywords->pluck('name')->all()) }}</dd>

    <dt class="col-sm-3">Created at</dt>
    <dd class="col-sm-9">{{ $asset->created_at }}</dd>

    <dt class="col-sm-3">Updated at</dt>
    <dd class="col-sm-9">{{ $asset->updated_at }}</dd>
</dl>
