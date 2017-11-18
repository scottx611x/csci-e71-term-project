@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')
<section class="engine"><a href="/">bootstrap modal popup</a></section><section class="mbr-section form1 cid-qAUFMxQIkB" id="form1-3" data-rv-view="44">
    <div class="container">
        <div class="row justify-content-center">
            @if (count($result)===1)
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        View Asset
                    </h2>
                    <h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        @foreach($result->toArray() as $key => $value)
                            <h2>{{ $key }} : {{ $value }}</h2>
                            @endforeach
                </div>
            @endif
            @if (count($result)>1)
                <div class="title col-12 col-lg-12">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        View Assets
                    </h2>
                        <h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-12">
                            <table>
                                @foreach ($result as $rec)
                                    <tr>
                                        @foreach($rec->toArray() as $key => $value)
                                            <th>{{ $key }}</th>
                                            @endforeach
                                        </tr>
                                        @break
                                @endforeach
                                @foreach ($result as $rec)
                                    <tr>
                                        @foreach($rec->toArray() as $key => $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
