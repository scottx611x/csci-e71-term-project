@extends('layouts.master')

@section('title')
    View Warranties
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Warranties
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Id</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($warranties as $warranty)
                        <tr>
                            <td><a href="{{ URL::to('warranty/'. $warranty->id) }}" target="_blank">View</a></td>
                            <td>{{ $warranty->id }}</td>
                            <td>{{ $warranty->description }}</td>
                            <td>{{ $warranty->start_date }}</td>
                            <td>{{ $warranty->end_date }}</td>
                            <td>{{ $warranty->created_at }}</td>
                            <td>{{ $warranty->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
