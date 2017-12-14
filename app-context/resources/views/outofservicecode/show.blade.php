@extends('layouts.master')

@section('title')
    View Out of Service Code {{ $outofservicecode->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Out of Service Code {{ $outofservicecode->id }}
                </h2>
            </div>

            @include('outofservicecode.detail')

        </div>
    </section>
@endsection
