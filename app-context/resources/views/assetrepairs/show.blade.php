@extends('layouts.master')

@section('title')
    View Asset Repairs
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    View Asset Repairs for Asset {{ $assetrepairs->asset_id }}
                </h2>
            </div>
        </div>
    </section>
@endsection
