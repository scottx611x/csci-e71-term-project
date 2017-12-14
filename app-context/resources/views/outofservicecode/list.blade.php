@extends('layouts.master')

@section('title')
    View Out of Service Codes
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Out of Service Codes
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Id</th>
                        <th>Reason</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($outofservicecodes as $outofservicecode)
                        <tr>
                            <td><a href="{{ URL::to('outofservicecode/'. $outofservicecode->id) }}" target="_blank">View</a></td>
                            <td>{{ $outofservicecode->id }}</td>
                            <td>{{ $outofservicecode->reason }}</td>
                            <td>{{ $outofservicecode->created_at }}</td>
                            <td>{{ $outofservicecode->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
