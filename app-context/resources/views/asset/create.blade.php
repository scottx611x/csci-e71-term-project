@extends('layouts.master')

@section('title')
New Asset
@endsection


@section('content')
<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                Add Asset
            </h2>
        </div>
        <form method='POST' action='/asset'>
            {{ csrf_field() }}

            @include('asset.form')

            <div class="row justify-content-center">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
@endsection
