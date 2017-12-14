@extends('layouts.master')

@section('title')
    View Computer
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Computer for Asset {{ $computer->asset_id }}
                </h2>
            </div>

            @include('computer.detail')

        </div>
    </section>
@endsection
