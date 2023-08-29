@extends('layouts.auth')

@section('title')
  {{ __('Login') }}
@endsection

@section('header')
  <div class="text-center mt-4">
    <h1 class="h2">{{ __('Welcome back') }}</h1>
    <p class="lead">
      {{ __('Sign in to your account to continue') }}
    </p>
  </div>
@endsection

@section('content')
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <section class="card">
    <div class="card-body">
      <div class="m-sm-4">
        <div class="text-center">
          <img src="{{asset('img/avatars/dummy.png')}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
        </div>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">{{ __('Email') }}</label>
            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
          </div>
          <div class="mb-3">
            <label class="form-label">{{ __('Password') }}</label>
            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
          </div>
          <div class="row g-3">
            <div class="col">
              <label class="form-check">
                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                <span class="form-check-label">{{__('Remember me')}}</span>
              </label>
            </div>
            <div class="col">
              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{__('Forgot password?')}}</a>
              @endif
            </div>
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-lg btn-primary">{{ __('Sign in') }}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection