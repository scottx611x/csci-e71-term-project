<p><i class="fa fa-asterisk" aria-hidden="true"></i>-> indicates required fields</p>

<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description<i class="fa fa-asterisk" aria-hidden="true"></i></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="description" value='{{ old('description', $computertype->description) }}' maxlength="50" placeholder="Description">
        @if($errors->get('description'))
            <ul class="alert alert-danger" role="alert">
                @foreach($errors->get('description') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
