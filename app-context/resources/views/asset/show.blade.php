@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')
<section class="engine"><a href="/">bootstrap modal popup</a></section><section class="mbr-section form1 cid-qAUFMxQIkB" id="form1-3" data-rv-view="44">
    <div class="container">
        <div class="row justify-content-center">
            @if (count($result)===1)
                <div class="title col-12 col-lg-12 col-xl-12">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        View Asset
                    </h2>
                    <h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    <p>id: {{$result->id}}</p>
                    <p>owner: {{$result->owner}}</p>
                    <p>description: {{$result->description}}</p>
                    <p>purchase_price: {{$result->purchase_price}}</p>
                    <p>purchase_date: {{$result->purchase_date}}</p>
                    <p>serial_number: {{$result->serial_number}}</p>
                    <p>estimated_life_months: {{$result->estimated_life_months}}</p>
                    <p>assigned_to: {{$result->assigned_to}}</p>
                    <p>assigned_date: {{$result->assigned_date}}</p>
                    <p>tag: {{$result->tag}}</p>
                    <p>scheduled_retirement_year: {{$result->scheduled_retirement_year}}</p>
                </div>
            @endif
            @if (count($result)>1)
                <div class="title col-12 col-lg-12 col-xl-12">
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
                                            @if ($key=='id')
                                                <td><a href="./{{$value}}">{{$value}}</a></td>
                                            @else
                                                <td>{{ $value }}</td>
                                            @endif
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
