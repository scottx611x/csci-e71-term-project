@extends('layouts.master')

@section('title')
    View Location {{ $location->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Location {{ $location->id }}
                </h2>
            </div>

            @include('location.detail')

        </div>
    </section>
@endsection
