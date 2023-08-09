@extends('layouts.admin')

@section('title')
    {{ __('Add New Role') }}
@endsection

@section('content')
  <section class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="form-group my-2">
                  <label for="title">Role Title</label>
                  <div class="input-group">
                    <input type="text" name="title" class="form-control" id="title" required />
                  </div>
                </div>
                <div class="form-group my-2">
                  <label for="description">Role Description</label>
                  <div class="input-group">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="6"></textarea>
                  </div>
                </div>
                <div class="form-group my-2">
                  <label for="slug">Role Slug</label>
                  <div class="input-group">
                    <input type="text" name="slug" class="form-control" id="slug" />
                  </div>
                </div>
                <div class="form-group my-2">
                  <label for="status">Role Status</label>
                  <div class="input-group">
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Enable') }}</option>
                      <option value="0">{{ __('Disable') }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col-6 d-grid">
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">{{ __('Discard') }}</span>
                    </a>
                  </div>
                  <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-plus"></i>
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