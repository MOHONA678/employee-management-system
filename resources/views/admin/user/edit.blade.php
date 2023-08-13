@extends('layouts.admin')

@section('title')
    {{ __('Edit user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  <section class="container-fluid">
    <div class="container col-12">
      <div class="d-flex align-items-center justify-content-center">
        <div class="col-7">
          <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Update user') }}</h5>
              </div>
              <div class="card-body py-0">
                <div class="row g-3">
                  <div class="col-12">
                    <input type="text" name="name" class="form-control" id="title" placeholder="{{ __('Name') }}" value="{{ $user->name }}" required />
                  </div>
                  <div class="col-12">
                    <input type="text" name="email" class="form-control" id="title" placeholder="{{ __('Email') }}" value="{{ $user->email }}" required />
                  </div>
                  <div class="col-12">
                    <input type="text" name="phone" class="form-control" id="title" placeholder="{{ __('phone') }}" value="{{ $user->phone }}" required />
                  </div>
                  <div class="col-6">
                    <select name="role_id" class="form-control" id="role">
                      <option value="">{{ __('-- User Role --') }}</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id === $user->role_id ? 'selected' : '' }} >{{ $role->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose Status --') }}</option>
                      <option value="1" {{ $user->status == 1 ? 'selected' : '' }} >{{ __('Enable') }}</option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }} >{{ __('Disable') }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-6 d-grid">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary" >
                      <i class="align-middle me-1" data-feather="arrow-left"></i>
                      <span class="ps-1">{{ __('Discard') }}</span>
                    </a>
                  </div>
                  <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-outline-secondary" >
                      <i class="align-middle me-1" data-feather="check"></i>
                      <span class="ps-1">{{ __('Update') }}</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        {{-- <div class="col-5">
          @include('partials.error')
        </div> --}}
      </div>
    </div>
  </section>
@endsection

@section('script')
    
@endsection