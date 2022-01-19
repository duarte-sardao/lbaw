@extends('layouts.app')

@section('content')

<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="lostpassword"></a>

  <div class="login_wrapper">
      <div class="animate form login_form">
          <section class="login_content">
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
              @endif

              <form class="form-horizontal" role="form" method="POST" action="{{ route('resetPassword') }}">
              <div class="card-header container">
                @csrf  
                
                <h2>Password Reset</h2>
                  <div class="d-flex justify-content-end">
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      @if ($errors->has('email'))
                      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                      @endif
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                  </div>

                  <div>
                      <button type="submit" class="btn btn-default submit">Send Password Reset Link</button>
                      <a class="reset_pass" href="{{route('login')}}">Login</a>
                  </div>

                  <div class="clearfix"></div>

                  <div class="separator">

                      <div class="clearfix"></div>
                      <br />

                  </div>
              </form>
</div>
          </section>
      </div>
  </div>
</div>
@endsection