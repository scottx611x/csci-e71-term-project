@extends('layouts.master')

@section('title')
Edit Asset
@endsection


@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                Edit Asset
            </h2>
        </div>
        <form method='POST' action='/asset/{{ $result->id }}'>
            {{ method_field('put') }}
            {{ csrf_field() }}

            @include('asset.form')

            <div class="row justify-content-center">
                <div class="form-group row">
                    <div >
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ URL::to('asset/'. $result->id.'') }}">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
