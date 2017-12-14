@extends('layouts.master')

@section('title')
    View Computer Type {{ $computertype->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Computer Type {{ $computertype->id }}
                </h2>
            </div>
            <a class="btn btn-warning" href="{{ URL::to('computertype/'. $computertype->id.'/edit') }}">Edit</a>

            @include('computertype.detail')

        </div>
    </section>
@endsection
