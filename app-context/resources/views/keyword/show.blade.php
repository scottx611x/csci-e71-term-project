@extends('layouts.master')

@section('title')
    View Keyword {{ $keyword->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Keyword {{ $keyword->id }}
                </h2>
            </div>

            @include('keyword.detail')

        </div>
    </section>
@endsection
