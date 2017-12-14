@extends('layouts.master')

@section('title')
    Log In
@endsection

@section('content')
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <h2>
                    Log In
                </h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="row justify-content-center">
                    <p class="text-info">Already have an account?<a href='/login'>Login here...</a></p>
                </div>
                <p><i class="fa fa-asterisk" aria-hidden="true"></i>-> denotes required fields</p>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value='{{ old('name') }}' maxlength="50" placeholder="Name" autofocus>
                        @if($errors->get('name'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-Mail Address<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value='{{ old('email') }}' maxlength="50" placeholder="E-Mail Address" autofocus>
                        @if($errors->get('email'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                    <div class="col-sm-10">
                        <input type="password"  class="form-control" name="password" id="password" value='{{ old('password') }}' placeholder="Password">
                        @if($errors->get('password'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password<i class="fa fa-asterisk" aria-hidden="true"></i></label>
                    <div class="col-sm-10">
                        <input type="password"  class="form-control" name="password_confirmation" id="password-confirm" value='{{ old('password') }}' placeholder="Confirm Password">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
