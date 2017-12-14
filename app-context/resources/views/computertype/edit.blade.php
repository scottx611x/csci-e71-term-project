@extends('layouts.master')

@section('title')
    Edit Computer Type
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    Edit Computer Type {{ $computertype->id }}
                </h2>
            </div>
            <form method='POST' action='/computertype/{{ $computertype->id }}'>
                {{ method_field('put') }}
                {{ csrf_field() }}

                @include('computertype.form')

                <div class="row justify-content-center">
                    <div class="form-group row">
                        <div >
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-secondary" href="{{ URL::to('computertype/'. $computertype->id.'') }}">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
