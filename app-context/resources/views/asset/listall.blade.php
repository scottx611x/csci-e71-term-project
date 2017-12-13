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

            @include('asset.list')

        </div>
    </section>
@endsection
