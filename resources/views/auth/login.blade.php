@extends('layouts.app')

@section('content')
    <section class="content d-flex justify-content-evenly m-5" id = "content">
        <div class="card w-50 d-flex flex-column align-items-center">
            <h3 class = "m-3">Login to your account</h3>

            <form class = "card-body w-75" id = "login-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group d-flex flex-column mt-3">
                <label for="email">
                    <h6>Email</h6>
                </label>
                <input class = "form-control" id="email" type="email" name="email" value="" required>
                @if ($errors->has('email'))
                    <span class="error">
                    {{ $errors->first('email') }}
                    </span>
                @endif
                </div>
                
                <div class="form-group d-flex flex-column mt-3">
                <label for="password">
                    <h6>Password</h6>
                </label>
                <input class = "form-control" id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="error">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                </div>
                
                <div class="form-group d-flex justify-content-between align-items-center mt-2">
                <label>
                    <input class = "m-1" type="checkbox" name="remember">Remember Me
                </label>
                <small><a href = "#">Can't remember your password?</a></small>
                </div>
                
                <div class="form-group d-flex mt-3">
                <button class = "btn btn-primary w-50 m-2" id = "login-button" type="submit">Login</button>
                <button class = "btn btn-outline-primary w-50 m-2" id = "register-button">
                    <a class="w-50 m-2" href="{{route('register')}}">Register</a>
                </button>
                </div>
                
            </form>
        </div>
    </section>
@endsection
