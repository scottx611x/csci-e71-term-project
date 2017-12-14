@extends('layouts.master')

@section('title')
    View Group {{ $group->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Group {{ $group->id }}
                </h2>
            </div>

            @include('group.detail')

        </div>
    </section>
@endsection
