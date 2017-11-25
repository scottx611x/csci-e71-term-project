@extends('layouts.master')

@section('title')
 New Asset
@endsection


@section('content')
<section class="engine"><a href="/">bootstrap modal popup</a></section><section class="mbr-section form1 cid-qAUFMxQIkB" id="form1-3" data-rv-view="44">
    <div class="container">
        <div class="row justify-content-center">
             <h1>Add a new asset</h1>
            </br>

             @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </br>
            @endif


             <form method='POST' action='/asset'>
    {{ csrf_field() }}

    <label for='owner'>Owner</label> <input type='text' name='owner' id='owner' value='{{ old('owner') }}'> </br>
    <label for='description'>description</label> <input type='text' name='description' id='description' value='{{ old('description') }}'> </br>
    <label for='purchase_price'>purchase_price</label> <input type="number" step="0.01" name='purchase_price' id='purchase_price' value='{{ old('purchase_price') }}'> </br>
    <label for='purchase_date'>purchase_date</label> <input type='date' name='purchase_date' id='purchase_date' value='{{ old('purchase_date') }}'> </br>
    <label for='serial_number'>serial_number</label> <input type='text' name='serial_number' id='serial_number' value='{{ old('serial_number') }}'> </br>
    <label for='notes'>notes</label> <input type='text' name='notes' id='notes' value='{{ old('notes') }}'> </br>
    <label for='estimated_life_months'>estimated_life_months</label> <input type='number' name='estimated_life_months' id='estimated_life_months' value='{{ old('estimated_life_months') }}'> </br>
    <label for='out_of_service_date '>out_of_service_date</label> <input type='date' name='out_of_service_date ' id='out_of_service_date ' value='{{ old('out_of_service_date') }}'> </br>
    <label for='assigned_to'>assigned_to</label> <input type='text' name='assigned_to' id='assigned_to' value='{{ old('assigned_to') }}'> </br>
    <label for='assigned_date'>assigned_date</label> <input type='date' name='assigned_date' id='assigned_date' value='{{ old('assigned_date') }}'> </br>
    <label for='tag'>tag</label> <input type='text' name='tag' id='tag' value='{{ old('tag') }}'> </br>
    <label for='scheduled_retirement_year'>scheduled_retirement_year</label> <input type='number' name='scheduled_retirement_year' id='scheduled_retirement_year' value='{{ old('scheduled_retirement_year') }}'> </br>

    <input type='submit' value='Add asset'>
</form>
        </div>
    </div>
</section>
@endsection
