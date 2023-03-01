<section class="vh-100" style="background-color: #52E0E7;">
@extends('layouts.app')

@section('content' )

<!-- Section: Design Block -->
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: #52E0E7;">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Selamat Datang <br />
            <span class="text-primary">di platform Survey Management</span>
          </h1>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form method="POST" action="{{ route('login') }}">
                        @csrf

                <!-- Email input -->
                <div class="form-outline mb-4">
                <label for="email" class="flex-column col-form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <label for="password" class="flex-column col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                    </span>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button class="btn btn-info btn-lg btn-block text-light mb-2" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                  <p class="mb-2">or</p>
                  <a href="{{ route('login.google') }}" class="btn btn-block btn-lg text-light" style="background-color: #dd4b39;"><i class="fab fa-google me-2"></i>{{ __('Login with Google') }}</a>
                  @if (Route::has('password.request'))
                      <a class="btn btn-link float-left pl-0 mt-2" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
@endsection
