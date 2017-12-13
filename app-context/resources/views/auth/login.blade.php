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
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="row justify-content-center">
                    <p class="text-info">Don't have an account?<a href='/register'>Register here...</a></p>
                </div>
                <p><i class="fa fa-asterisk" aria-hidden="true"></i>-> denotes required fields</p>

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
                    <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                            <div class="form-check-label">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>
                            Login
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
