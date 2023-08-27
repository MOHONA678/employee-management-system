@extends('layouts.admin')

@section('title')
  {{ __('Manage Designations') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Manage Designations</h1>
    <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.create') : route('hr.designation.create') ) }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add New') }}</span>
    </a>
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <table class="table data-table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Designation Title</th>
            <th scope="col">Status</th>
            <th scope="col">Date Created</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($designations as $designation)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $designation->title }}</td>
              <td>
                @if ($designation->status === 1)
                  <span class="badge bg-success">Enable</span>
                @elseif ($designation->status === 0)
                  <span class="badge bg-danger">Disable</span>
                @else
                  <span class="badge bg-secondary">Pending</span>
                @endif
              </td>
              <td>
                {{ $designation->created_at->diffforhumans() }}
              </td>
              <td class="d-flex justify-content-center ">
                <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.edit', $designation->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.edit', $designation->id) : route('hr.designation.edit', $designation->id) ) }}" class="btn btn-outline-success btn-sm mx-2">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.destroy', $designation->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.destroy', $designation->id) : route('hr.designation.destroy', $designation->id) ) }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-outline-danger btn-sm" onclick="del(event, this)">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">{{ __('No Data Found') }}</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('script')
@endsection
