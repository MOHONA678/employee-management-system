@extends('layouts.admin')

@section('title')
  {{ __('Manage Roles') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Manage Roles') }}</h1>
    <a href="{{route('roles.create')}}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add new') }}</span>
    </a>
  </div>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <div class="card flex-fill">
        <div class="card-header">              
          <h5 class="card-title mb-0">{{ __('Roles DataTable') }}</h5>
        </div>
        <table class="table table-hover my-0 data-table">
          <thead>
            <tr>
              <th class="d-none d-xl-table-cell">{{ __('SL') }}</th>
              <th>{{ __('Role Title') }}</th>
              <th class="d-none d-xl-table-cell">{{ __('Role Slug') }}</th>
              <th>{{ __('Status') }}</th>
              <th class="d-none d-md-table-cell">{{ __('Date Created') }}</th>
              <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($roles as $k => $role)
              <tr>
                <td class="d-none d-xl-table-cell">{{ $k + 1 }}</td>
                <td>
                  <strong>{{ $role->title }}</strong>
                </td>
                <td class="d-none d-xl-table-cell">{{ $role->slug }}</td>
                <td>
                  @if ($role->status === 1)
                    <span class="badge bg-success">Enable</span>
                  @elseif ($role->status === 0)
                    <span class="badge bg-danger">Disable</span>
                  @else
                    <span class="badge bg-secondary">Pending</span>
                  @endif
                </td>
                <td class="d-none d-md-table-cell">{{ $role->created_at->diffforhumans() }}</td>
                <td width="90px">
                  <form action="{{ route("roles.destroy", $role->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-sm" onclick="del(event, this)" >
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </form>
                </td>
              </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">
                {{ __('No data found') }}
              </td>
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