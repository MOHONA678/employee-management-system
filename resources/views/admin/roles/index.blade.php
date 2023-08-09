@extends('layouts.admin')

@section('title')
    {{ __('Manage Roles') }}
@endsection

@section('content')
  <section class="container-fluid">
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Role Title</th>
            <th scope="col">Role Slug</th>
            <th scope="col">Role Status</th>
            <th scope="col">Date Created</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($roles as $role)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $role->title }}</td>
              <td>{{ $role->slug }}</td>
              <td>
                @if ($role->status === 1)
                  <span class="badge bg-success">Enable</span>
                @elseif ($role->status === 0)
                  <span class="badge bg-danger">Disable</span>
                @else
                  <span class="badge bg-secondary">Pending</span>
                @endif
              </td>
              <td>{{ $role->created_at->diffforhumans() }}</td>
              <td>
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-success btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <button type="button" class="btn btn-outline-danger btn-sm">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6">{{ __('No Data Found') }}</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
@endsection

@section('script')
    
@endsection