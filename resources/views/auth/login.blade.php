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
          <p style="color: hsl(217, 10%, 50.8%)">
            platform ini digunakan untuk mengajukan survey dan pertanyaan
            kepada umum dengan tujuan Lorem ipsum dolor sit amet 
            consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
          <div class="card-header" style="background-color: #AED6F1;">{{ __('Login') }}</div>
            <div class="card-body py-5 px-md-5">
            <form method="POST" action="{{ route('login') }}">
                        @csrf

                <!-- Email input -->
                <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                  <label for="email" class="col-md-4 flex-column col-form-label">{{ __('Email Address') }}</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                  <label for="password" class="col-md-4 flex-column col-form-label">{{ __('Password') }}</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                    </label>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button class="btn btn-info btn-lg btn-block text-light mb-4" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or</p>
                  <a href="{{ route('login.google') }}" class="btn btn-outline-info">{{ __('Login with Google') }}</a>
                                    @if (Route::has('password.request'))
                                    <br>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
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
