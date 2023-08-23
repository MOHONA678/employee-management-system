@extends('layouts.admin')

@section('title')
  {{ __('Manage Leave') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Manage Leaves</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary">
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
            <th scope="col">Name</th>
            {{-- <th scope="col">Start time</th>
            <th scope="col">End time</th> --}}
            <th scope="col">Leave type</th>
            <th scope="col">Date Applied</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($leaves as $leave)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $leave->employee->firstname }}
                {{ $leave->employee->lastname }}</td>
              <td>
                @if ($leave->leave_type === 1)
                  <span class="badge bg-info">Vacation</span>
                @elseif ($leave->leave_type === 2)
                  <span class="badge bg-info">Sick Leave</span>
                @elseif ($leave->leave_type === 3)
                  <span class="badge bg-info">Emergency Leave</span>
                @elseif ($leave->leave_type === 4)
                  <span class="badge bg-info">Involuntary Leave</span>
                @elseif ($leave->leave_type === 5)
                  <span class="badge bg-info">Medical Leave</span>
                @elseif ($leave->leave_type === 6)
                  <span class="badge bg-info">Casual Leave</span>
                @else
                  <span class="badge bg-info">Marriage Leave</span>
                @endif
              </td>
              <td>
                {{ $leave->created_at->diffforhumans() }}
              </td>
              <td>
                @if ($leave->status === 1)
                  <span class="badge bg-success">Approved</span>
                @elseif ($leave->status === 0)
                  <span class="badge bg-danger">Rejected</span>
                @else
                  <span class="badge bg-secondary">Pending</span>
                @endif
              </td>
              <td class="d-flex justify-content-center ">
                <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-outline-success btn-sm mx-2">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('leaves.destroy', $leave->id) }}" method="post">
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