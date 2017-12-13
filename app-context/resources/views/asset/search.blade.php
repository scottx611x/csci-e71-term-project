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
                <p class="text-info">Search by Id</p>
            </div>
            <form  class="form-inline" method='GET' action='/asset/search'>
                <label class="mr-sm-2" for="id_search_input">Id</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="id_search_input" id="id_search_input" value='{{ $id_search_input or '' }}' placeholder="Id">
                <button type="submit" class="btn btn-primary" name="submitbtn" value="submit-search-by-id">Submit</button>
            </form>
            <br/>
            <div>
                <div class="row justify-content-left">
                    <p class="text-info">Advanced Search (LIKE search for whichever fields used)</p>
                </div>
            </div>
            <form  class="form-inline" method='GET' action='/asset/search'>

                <label class="mr-sm-2" for="description_search_input">Description</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="description_search_input" id="description_search_input" value='{{ $description_search_input or '' }}' placeholder="Description">

                <label class="mr-sm-2" for="funding_source_search_input">Funding Source</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="funding_source_search_input" id="funding_source_search_input" value='{{ $funding_source_search_input or '' }}' placeholder="Funding Source">

                <label class="mr-sm-2" for="assigned_to_search_input">Assigned To</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="assigned_to_search_input" id="assigned_to_search_input" value='{{ $assigned_to_search_input or '' }}' placeholder="Assigned To">

                <label class="mr-sm-2" for="owner_search_input">Owner</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="owner_search_input" id="owner_search_input" value='{{ $owner_search_input or '' }}' placeholder="Owner">

                <div class="mr-sm-2">
                    <button type="submit" class="btn btn-primary" name="submitbtn" value="submit-advanced-search">Submit</button>
                </div>

            </form>

            @if(isset($alertMsg) && (!empty($alertMsg)))
                <div class="row justify-content-center">
                    <div class="bg-warning text-white"> {{ $alertMsg }}</div>
                </div>
            @elseif(count($assets) == 0)
                <div class="row justify-content-center">
                    <div class="bg-info text-white">No Matches found</div>
                </div>
            @else
                {{ count($assets) }}
                @include('asset.list')
            @endif
        </div>

    </section>
@endsection
