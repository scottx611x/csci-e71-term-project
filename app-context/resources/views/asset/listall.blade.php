@extends('layouts.master')

@section('title')
    View Asset
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Assets
                </h2>
            </div>
            <div class="row justify-content-left">
                <a class="btn btn-success" href="{{ URL::to('asset/export') }}">Export (CSV)</a>
            </div>
            <br/>

            @include('asset.list')

        </div>
    </section>
@endsection
