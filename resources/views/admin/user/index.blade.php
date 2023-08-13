@extends('layouts.admin')

@section('title')
    {{ __('Manage user') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Manage user') }}</h1>
    <a href="{{route('user.create')}}" class="btn btn-primary">
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
          <h5 class="card-title mb-0">{{ __('User DataTable') }}</h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th class="d-none d-xl-table-cell">{{ __('SL') }}</th>
              <th>{{ __('Name') }}</th>
              <th class="d-none d-xl-table-cell" >{{ __('Email') }}</th>
              <th class="d-none d-xl-table-cell">{{ __('Phone') }}</th>
              <th>{{ __('User Role') }}</th>
              <th>{{ __('Status') }}</th>
              <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($user as $k => $user)
              <tr>
                <td class="d-none d-xl-table-cell">{{ $k + 1 }}</td>
                <td>
                  <strong>{{ $user->name }}</strong>
                </td>
                <td class="d-none d-xl-table-cell">
                  <strong>{{ $user->email }}</strong>
                </td>
                <td class="d-none d-xl-table-cell">{{ $user->phone }}</td>
                <td>
                  <span class="badge bg-info">{{ $user->role->title }}</span>
                </td>
                <td>
                  @if ($user->status === 1)
                    <span class="badge bg-success">Enable</span>
                  @elseif ($user->status === 0)
                    <span class="badge bg-danger">Disable</span>
                  @else
                    <span class="badge bg-secondary">Pending</span>
                  @endif
                </td>
                {{-- <td class="d-none d-md-table-cell">{{ $user->action }}</td> --}}
                <td width="90px">
                  <form action="{{ route("user.destroy", $user->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="del(event, this)">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">{{ __('No data found') }}</td>
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