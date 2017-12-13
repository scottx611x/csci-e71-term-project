<dl class="row">
    <dt class="col-sm-3">Asset Id</dt>
    <dd class="col-sm-9"><a href="{{ URL::to('asset/'. $computer->asset_id) }}" target="_blank">{{ $computer->asset_id }}</a></dd>

    <dt class="col-sm-3">Computer Type</dt>
    <dd class="col-sm-9"><a href="{{ URL::to('computertype/'. $computer->computer_type_id) }}" target="_blank">{{ $computer->computertype->description }}</a></dd>

    <dt class="col-sm-3">Memory</dt>
    <dd class="col-sm-9">{{ $computer->memory }}</dd>

    <dt class="col-sm-3">Model</dt>
    <dd class="col-sm-9">{{ $computer->model }}</dd>

    <dt class="col-sm-3">Operating System</dt>
    <dd class="col-sm-9">{{ $computer->operating_system }}</dd>

    <dt class="col-sm-3">Mac Address</dt>
    <dd class="col-sm-9">{{ $computer->mac_address }}</dd>

    <dt class="col-sm-3">Created on</dt>
    <dd class="col-sm-9">{{ $computer->created_at }}</dd>

    <dt class="col-sm-3">Updated on</dt>
    <dd class="col-sm-9">{{ $computer->updated_at }}</dd>
</dl>
