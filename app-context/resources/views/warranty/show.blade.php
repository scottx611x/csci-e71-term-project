@extends('layouts.master')

@section('title')
    View Warranty
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Warranty {{ $warranty->id }}
                </h2>
            </div>

            @include('warranty.detail')

        </div>
    </section>
@endsection
