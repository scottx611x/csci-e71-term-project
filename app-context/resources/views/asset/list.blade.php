
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Details</th>
            <th>Id</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Purchase Price</th>
            <th>Purchase Date</th>
            <th>Funding Source</th>
            <th>Federal Participation (%)</th>
            <th>Serial Number</th>
            <th>Notes</th>
            <th>Estimated life (months)</th>
            <th>Assigned To</th>
            <th>Assigned Date</th>
            <th>Owner</th>
            <th>Tag</th>
            <th>Scheduled Retirement Year</th>
            <th>Group</th>
            <th>Location</th>
            <th>Warranty</th>
            <th>Vendor</th>
            <th>Is Out of Service?</th>
            <th>Out of Service Date</th>
            <th>Out of Service Code</th>
            <th>Is Computer?</th>
            <th>Computer Type</th>
            <th>Memory</th>
            <th>Model</th>
            <th>Operating System</th>
            <th>MAC Address</th>
            <th>Keywords</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>

        @foreach ($assets as $asset)
            <tr>
                <td><a href="{{ URL::to('asset/'. $asset->id) }}" target="_blank">View</a></td>
                <td>{{ $asset->id }}</td>
                <td>{{ $asset->description }}</td>
                <td>{{ $asset->quantity }}</td>
                <td>{{ $asset->purchase_price }}</td>
                <td>{{ $asset->purchase_date }}</td>
                <td>{{ $asset->funding_source }}</td>
                <td>{{ $asset->percent_federal_participation }}</td>
                <td>{{ $asset->serial_number }}</td>
                <td>{{ $asset->notes }}</td>
                <td>{{ $asset->estimated_life_months }}</td>
                <td>{{ $asset->assigned_to }}</td>
                <td>{{ $asset->assigned_date }}</td>
                <td>{{ $asset->owner }}</td>
                <td>{{ $asset->tag }}</td>
                <td>{{ $asset->scheduled_retirement_year }}</td>
                <td><a href="{{ URL::to('group/'. $asset->group_id ) }}" target="_blank">{{ $asset->group->description }}</a></td>

                @if($asset->location_id)
                    <td><a href="{{ URL::to('location/'. $asset->location_id ) }}" target="_blank">{{ $asset->location->description }}</a></td>
                @else
                    <td></td>
                @endif

                @if($asset->warranty_id)
                    <td><a href="{{ URL::to('warranty/'. $asset->warranty_id ) }}" target="_blank">{{ $asset->warranty->description }}</a></td>
                @else
                    <td></td>
                @endif

                @if($asset->vendor_id)
                    <td><a href="{{ URL::to('vendor/'. $asset->vendor_id ) }}" target="_blank">{{ $asset->vendor->company }}</a></td>
                @else
                    <td></td>
                @endif

                <td>{{ $asset->is_out_of_service ? "Yes" : "No" }}</td>

                @if($asset->is_out_of_service)
                    <td>{{ $asset->out_of_service_date }}</td>
                    <td><a href="{{ URL::to('outofservicecode/'. $asset->out_of_service_id ) }}" target="_blank">{{ $asset->outofservicecode->reason }}</a></td>
                @else
                    <td></td>
                    <td></td>
                @endif

                <td>{{ $asset->is_computer ? "Yes" : "No" }}</td>

                @if($asset->is_computer)
                    <td><a href="{{ URL::to('computertype/'. $asset->computer->computer_type_id ) }}" target="_blank">{{ $asset->computer->computertype->description }}</a></td>
                    <td>{{ $asset->computer->memory }}</td>
                    <td>{{ $asset->computer->model }}</td>
                    <td>{{ $asset->computer->operating_system }}</td>
                    <td>{{ $asset->computer->mac_address }}</td>
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif

                <td>{{ implode(', ', $asset->keywords->pluck('name')->all()) }}</td>
                <td>{{ $asset->created_at }}</td>
                <td>{{ $asset->updated_at }}</td>
            </tr>
        @endforeach
    </table>
</div>
