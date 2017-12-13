@extends('layouts.master')

@section('title')
    View Computers
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Computers
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Asset Id</th>
                        <th>Computer Type</th>
                        <th>Memory</th>
                        <th>Model</th>
                        <th>Operating System</th>
                        <th>Mac Address</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($computers as $computer)
                        <tr>
                            <td><a href="{{ URL::to('computer/'. $computer->asset_id) }}" target="_blank">View</a></td>
                            <td><a href="{{ URL::to('asset/'. $computer->asset_id) }}" target="_blank">{{ $computer->asset_id }}</a></td>
                            <td><a href="{{ URL::to('computertype/'. $computer->computer_type_id) }}" target="_blank">{{ $computer->computertype->description}}</a></td>
                            <td>{{ $computer->memory }}</td>
                            <td>{{ $computer->model }}</td>
                            <td>{{ $computer->operating_system }}</td>
                            <td>{{ $computer->mac_address }}</td>
                            <td>{{ $computer->created_at }}</td>
                            <td>{{ $computer->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
