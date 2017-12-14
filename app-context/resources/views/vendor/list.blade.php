@extends('layouts.master')

@section('title')
    View Vendors
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Vendors
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Details</th>
                        <th>Id</th>
                        <th>Company</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td><a href="{{ URL::to('vendor/'. $vendor->id) }}" target="_blank">View</a></td>
                            <td>{{ $vendor->id }}</td>
                            <td>{{ $vendor->company }}</td>
                            <td>{{ $vendor->address1 }}</td>
                            <td>{{ $vendor->address2 }}</td>
                            <td>{{ $vendor->city }}</td>
                            <td>{{ $vendor->state }}</td>
                            <td>{{ $vendor->zip }}</td>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ $vendor->phone }}</td>
                            <td>{{ $vendor->fax }}</td>
                            <td>{{ $vendor->created_at }}</td>
                            <td>{{ $vendor->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
