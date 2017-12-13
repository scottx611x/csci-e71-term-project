@extends('layouts.master')

@section('title')
    New Computer Type
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    Add Computer Type
                </h2>
            </div>
            <form method='POST' action='/computertype'>
                {{ csrf_field() }}

                @include('computertype.form');

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
