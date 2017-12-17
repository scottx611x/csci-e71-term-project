@extends('layouts.master')

@section('title')
    View Asset
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Asset {{ $asset->id }}
                </h2>
            </div>
            <a class="btn btn-success" href="{{ URL::to('asset/'. $asset->id.'/export') }}">Export (CSV)</a>
            <a class="btn btn-warning" href="{{ URL::to('asset/'. $asset->id.'/edit') }}">Edit</a>
            <a class="btn btn-danger" href="{{ URL::to('asset/'. $asset->id.'/delete') }}">Delete</a>
            <br/>
            <br/>

            @include('asset.detail')

        </div>
    </section>
@endsection
