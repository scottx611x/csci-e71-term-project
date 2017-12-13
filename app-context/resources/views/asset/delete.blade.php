@extends('layouts.master')

@section('title')
    Confirm Asset deletion: {{ $asset->id }}
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    Confirm Asset deletion
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="bg-danger text-white">Are you sure you want to delete this asset?</div>
            </div>
            @if (count($asset->assetrepairs)>=1)
                <div class="row">
                    <p class="bg-primary text-white">This asset has {{ count($asset->assetrepairs) }} repairs<a class="btn btn-info" href="{{ URL::to('assetrepairs/'. $asset->id) }}" target="_blank">View Repairs</a></p>
                </div>
            @endif

            @include('asset.detail')

            <form method='POST' action='/asset/{{ $asset->id }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}

                <div class="row justify-content-center">
                    <div class="form-group row">
                        <div >
                            <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                            <a class="btn btn-secondary" href="{{ $previousUrl }}">No, I changed my mind.</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
