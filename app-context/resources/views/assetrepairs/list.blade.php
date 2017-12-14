@extends('layouts.master')

@section('title')
    View Asset Repairs
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Asset Repairs
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Asset Id</th>
                        <th>Repair Date</th>
                        <th>Repair Cost</th>
                        <th>Repair Notes</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($assetrepairs as $rec)
                        <tr>
                            <td><a href="{{ URL::to('asset/'. $rec->asset_id) }}" target="_blank">{{ $rec->asset_id }}</a></td>
                            <td>{{ $rec->repair_date }}</td>
                            <td>{{ $rec->repair_cost }}</td>
                            <td>{{ $rec->notes }}</td>
                            <td>{{ $rec->created_at }}</td>
                            <td>{{ $rec->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
