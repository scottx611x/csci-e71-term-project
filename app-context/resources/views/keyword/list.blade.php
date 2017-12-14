@extends('layouts.master')

@section('title')
    View Keywords
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Keywords
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($keywords as $keyword)
                        <tr>
                            <td><a href="{{ URL::to('keyword/'. $keyword->id) }}" target="_blank">View</a></td>
                            <td>{{ $keyword->id }}</td>
                            <td>{{ $keyword->name }}</td>
                            <td>{{ $keyword->created_at }}</td>
                            <td>{{ $keyword->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
