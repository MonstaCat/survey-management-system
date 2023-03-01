<section class="vh-100" style="background-color: #728FCE;">
@extends('layouts.app')

@section('content' )

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark" style="border-radius: 1rem;">
        <div class="card-header fw-bold mb-2 text-uppercase">{{ __('Login') }}</div>
          

        <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 flex-column col-form-label">{{ __('Email Address') }}</label>

                            
                                <div class="form-outline form-white mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 flex-column col-form-label">{{ __('Password') }}</label>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 flex-column col-form-label">
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-info text-light">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="{{ route('login.google') }}" class="btn btn-outline-info">{{ __('Login with Google') }}</a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
