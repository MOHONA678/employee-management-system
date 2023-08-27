@extends('layouts.admin')

@section('title')
    {{ __('Edit Role') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Update Roles</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('role.update', $role->id) }}" method="post">
          @csrf
          @method('put')
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Update Existing Role') }}</h5>
            </div>
            <div class="card-body py-0">
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('Role Title') }}" value="{{ $role->title }}" required />
                </div>
                <div class="col-12">
                  <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="{{ __('Type details here ...') }}">{{ $role->description }}</textarea>
                </div>
                <div class="col-12">
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="{{ __('Role Slug') }}" value="{{ $role->slug }}" />
                </div>
                <div class="col-12">
                  <select name="status" class="form-control" id="status">
                    <option value="">{{ __('-- Choose Status --') }}</option>
                    <option value="1" {{ $role->status == 1 ? 'selected' : '' }} >{{ __('Enable') }}</option>
                    <option value="0" {{ $role->status == 0 ? 'selected' : '' }} >{{ __('Disable') }}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-6 d-grid">
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('roles.index', $role->id)  }}" class="btn btn-outline-secondary" >
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
    </div>
    {{-- <div class="col-5">
      @include('partials.error')
    </div> --}}
  </section>
@endsection

@section('script')
@endsection