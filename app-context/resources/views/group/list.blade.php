@extends('layouts.master')

@section('title')
    View Groups
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Groups
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
                    @foreach ($groups as $group)
                        <tr>
                            <td><a href="{{ URL::to('group/'. $group->id) }}" target="_blank">View</a></td>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->description }}</td>
                            <td>{{ $group->created_at }}</td>
                            <td>{{ $group->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
