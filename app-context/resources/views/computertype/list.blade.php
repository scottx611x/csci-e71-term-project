@extends('layouts.master')

@section('title')
    View Computer Types
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Computer Types
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
                    @foreach ($computertypes as $computertype)
                        <tr>
                            <td><a href="{{ URL::to('computertype/'. $computertype->id) }}" target="_blank">View</a></td>
                            <td>{{ $computertype->id }}</td>
                            <td>{{ $computertype->description }}</td>
                            <td>{{ $computertype->created_at }}</td>
                            <td>{{ $computertype->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
