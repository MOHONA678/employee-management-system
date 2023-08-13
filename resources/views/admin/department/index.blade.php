@extends('layouts.admin')

@section('title')
  {{ __('Manage Departments') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Manage Departments</h1>
    <a href="{{ route('department.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add New') }}</span>
    </a>
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Department Title</th>
            <th scope="col">Status</th>
            <th scope="col">Date Created</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($departments as $department)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $department->title }}</td>
              <td>
                @if ($department->status === 1)
                  <span class="badge bg-success">Enable</span>
                @elseif ($department->status === 0)
                  <span class="badge bg-danger">Disable</span>
                @else
                  <span class="badge bg-secondary">Pending</span>
                @endif
              </td>
              <td>
                {{ $department->created_at->diffforhumans() }}
              </td>
              <td class="d-flex justify-content-center ">
                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-outline-success btn-sm mx-2">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('department.destroy', $department->id) }}" method="post">
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
