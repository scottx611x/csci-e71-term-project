@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')

<section >
    <div class="container">
        @if (count($result)===1)
        <div>
            <div class="row justify-content-center">
                <h2>
                    View Asset
                </h2>
            </div>
            <a class="btn btn-warning" href="{{ URL::to('asset/'. $result->id.'/edit') }}">Edit</a>
            <a class="btn btn-danger" href="{{ URL::to('asset/'. $result->id.'/delete') }}">Delete</a>
            @if (count($result->assetrepairs)>=1)
            <div class="row">
                <p class="bg-primary text-white">This asset has {{ count($result->assetrepairs) }} repairs<a class="btn btn-info" href="{{ URL::to('assetrepairs/'. $result->id) }}" target="_blank">View Repairs</a></p>
            </div>
            @endif
            <dl class="row">
                @foreach($result->toArray() as $key => $value)
                @if (gettype($value)!='array')
                <dt class="col-sm-3">{{ $key }}</dt>
                <dd class="col-sm-9">{{ $value }}</dd>
                @endif
                @endforeach
            </dl>
        </div>
        @endif

        @if (count($result)>1)
        <div>
            <div class="row justify-content-center">
                <h2>
                    View Assets
                </h2>
            </div>
            <h6 >
                <div class="table-responsive">
                    <table class="table">
                        @foreach ($result as $rec)
                        <tr>
                            <th>Details</th>
                            @foreach($rec->toArray() as $key => $value)
                            <th>{{ $key }}</th>
                            @endforeach
                        </tr>
                        @break
                        @endforeach

                        @foreach ($result as $rec)
                        <tr>
                            <td><a href="{{ URL::to('asset/'. $rec->id) }}" target="_blank">View</a></td>
                            @foreach($rec->toArray() as $key => $value)
                            @if ($key === 'group_id')
                                <td><a href="{{ URL::to('groups/'. $value) }}" target="_blank">{{ $value }}</a></td>
                            @elseif ($key === 'location_id')
                                <td><a href="{{ URL::to('locations/'. $value) }}" target="_blank">{{ $value }}</a></td>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @endif
        </div>

    </div>
</section>
@endsection
