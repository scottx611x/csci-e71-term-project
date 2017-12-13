@extends('layouts.master')

@section('title')
    View Vendor {{ $vendor->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Vendor {{ $vendor->id }}
                </h2>
            </div>

            @include('vendor.detail')

        </div>
    </section>
@endsection
