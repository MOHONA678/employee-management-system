@extends('layouts.admin')

@section('title')
    {{ __('Add New user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  <section class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="card">
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
                  {{-- <div class="col-12">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="{{ __('Type details here ...') }}">{{ old('description') }}</textarea>
                  </div> --}}
                  <div class="col-12">
                    <input type="text" name="password" class="form-control" id="slug" placeholder="{{ __('Password') }}" value="{{ old('password') }}" />
                  </div>
                  <div class="col-12">
                    <input type="text" name="cpass" class="form-control" id="slug" placeholder="{{ __('Confirm password') }}" value="{{ old('confirm password') }}" />
                  </div>
                  {{-- <div class="col-12">
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose Status --') }}</option>
                      <option value="1">{{ __('Enable') }}</option>
                      <option value="0">{{ __('Disable') }}</option>
                    </select>
                  </div> --}}
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
                    <button type="submit" class="btn btn-outline-primary" >
                      <i class="align-middle me-1" data-feather="plus"></i>
                      <span class="ps-1">{{ __('Create New') }}</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-5">
          @include('partials.error')
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
    
@endsection