@extends('layouts.master')

@section('title')
    View Locations
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Locations
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Id</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($locations as $location)
                        <tr>
                            <td><a href="{{ URL::to('location/'. $location->id) }}" target="_blank">View</a></td>
                            <td>{{ $location->id }}</td>
                            <td>{{ $location->description }}</td>
                            <td>{{ $location->created_at }}</td>
                            <td>{{ $location->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
