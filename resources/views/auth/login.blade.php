@extends('auth._partials.default')

@section('content')

<main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mb-0">Survey Management System</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">{{ __('Email Address') }}</label>
                                    <input type="email" class="form-control">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label mb-0 ms-3"
                                        for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn bg-gradient-warning w-100 mb-1 mt-4"
                                        type="submit">{{ __('Login') }}</button>
                                </div>
                                <p class="mb-1 text-center">or</p>
                                <div class="text-center">
                                    <!-- <button type="button" class="btn bg-gradient-primary w-100 mb-2">Login with Google</button> -->
                                    <a href="{{ route('login.google') }}" class="btn bg-gradient-info w-100 mb-1"
                                        style="background-color: #dd4b39;"><i
                                            class="fab fa-google me-2"></i>{{ __('Login with Google') }}</a>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link float-left pl-0 mt-2" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop