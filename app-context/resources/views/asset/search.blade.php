@extends('layouts.master')

@section('title')
    Search Asset
@endsection


@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    Search Asset
                </h2>
            </div>

            <div class="row justify-content-left">
                <h4>Search by Id</h4>
            </div>
            <form  class="form-inline" method='GET' action='/asset/search'>
                <label class="mr-sm-2" for="id_search_input">Id</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="id_search_input" id="id_search_input" value='{{ $id_search_input or '' }}' placeholder="Id">
                <button type="submit" class="btn btn-primary" name="submitbtn" value="submit-search-by-id">Submit</button>
            </form>
            <br/>
            <div>
                <div class="row justify-content-left">
                    <h4>Advanced Search (by similarity)</h4>
                </div>
            </div>
            <form class="form-inline" method='GET' action='/asset/search'>

                <div>
                    <label class="mr-sm-2" for="description_search_input">Description</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="description_search_input" id="description_search_input" value='{{ $description_search_input or '' }}' placeholder="Description">
                </div>

                <div>
                    <label class="mr-sm-2" for="funding_source_search_input">Funding Source</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="funding_source_search_input" id="funding_source_search_input" value='{{ $funding_source_search_input or '' }}' placeholder="Funding Source">
                </div>

                <div>
                    <label class="mr-sm-2" for="assigned_to_search_input">Assigned To</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="assigned_to_search_input" id="assigned_to_search_input" value='{{ $assigned_to_search_input or '' }}' placeholder="Assigned To">
                </div>

                <div>
                    <label class="mr-sm-2" for="owner_search_input">Owner</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="owner_search_input" id="owner_search_input" value='{{ $owner_search_input or '' }}' placeholder="Owner">
                </div>

                <div class="mr-sm-2">
                    <label class="mr-sm-2" >&nbsp;</label>
                    <button type="submit" class="btn btn-primary" name="submitbtn" value="submit-advanced-search">Submit</button>
                </div>

            </form>
            <br/>

            @if(isset($alertMsg) && (!empty($alertMsg)))
                <div class="row justify-content-center">
                    <div class="bg-warning text-white"> {{ $alertMsg }}</div>
                </div>
            @elseif(count($assets) == 0)
                <div class="row justify-content-center">
                    <div class="bg-info text-white">No Matches found</div>
                </div>
            @else
                <div class="row justify-content-left">
                    <h4>Results: {{ count($assets) }} Record(s) Found</h4>
                </div>
                <div class="row justify-content-left">
                    <a class="btn btn-success" href="{{ URL::to(isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : ''.'&export=1') }}">Export (CSV)</a>
                </div>
                <br/>
                @include('asset.list')
            @endif
        </div>

    </section>
@endsection
