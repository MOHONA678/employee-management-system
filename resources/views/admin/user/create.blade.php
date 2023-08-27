@extends('layouts.admin')

@section('title')
    {{ __('Add New user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Update User</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('user.store') : (Auth::user()->role->slug === 'administrator' ? route('admin.user.store')  ) }}" method="post">
          @csrf
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Create New user') }}</h5>
            </div>
            <div class="card-body py-0">
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="name" class="form-control" id="title" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required />
                </div>
                <div class="col-12">
                  <input type="email" name="email" class="form-control" id="title" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                </div>
                <div class="col-12">
                  <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('Primary Phone') }}" value="{{ old('phone') }}" required oninput="formatPhoneNumber(this)" maxlength="19" />
                  {{-- <input type="text" name="phone" class="form-control" id="slug" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" /> --}}
                </div>
                <div class="col-6">
                  <input type="password" name="password" class="form-control" id="slug" placeholder="{{ __('Password') }}" value="{{ old('password') }}" />
                </div>
                <div class="col-6">
                  <input type="password" name="cpass" class="form-control" id="slug" placeholder="{{ __('Confirm password') }}" value="{{ old('confirm password') }}" />
                </div>  
                <div class="col-6">
                  <select name="role_id" class="form-control" id="role">
                    <option value="">{{ __('-- User Role --') }}</option>
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-6">
                  <select name="status" class="form-control" id="status">
                    <option value="">{{ __('-- Choose Status --') }}</option>
                    <option value="1">{{ __('Enable') }}</option>
                    <option value="0">{{ __('Disable') }}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-6 d-grid">
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('user.index', $user->id) : route('admin.user.index', $user->id)}}" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="arrow-left"></i>
                    <span class="ps-1">{{ __('Discard') }}</span>
                  </a>
                </div>
                <div class="col-6 d-grid">
                  <button type="submit" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="plus"></i>
                    <span class="ps-1">{{ __('Create New') }}</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- <div class="col-5">
      @include('partials.error')
    </div> --}}
  </section>
@endsection

@section('script')
@endsection