@extends('template.blank')

@section('title','Login')

@section('content')
    <div class="w-100 bg-white" style="height: 100vh; position: fixed;">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 col-xl-3">

                <div class="login-brand mt-4 mb-4">
                    <img src="{{ asset('dist/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow bg-white p-2 rounded-circle">
                </div>

                <div class="card card-primary shadow-lg">
                    <div class="card-header"><h4>Login</h4></div>

                  <div class="card-body">
                    <form method="POST" action="{{ route('emp.login') }}" class="needs-validation">
                        @csrf
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="username" class="form-control{{ session('error') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                        @if (session('error'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" tabindex="3" id="remember" checked>
                          <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Login
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
                <div class="text-primary text-center">
                  Login Admin? <a class="text-primary font-weight-bold" href="{{ route('login') }}">Click Here</a>
                </div>
              </div>
            </div>
        </div>

@endsection