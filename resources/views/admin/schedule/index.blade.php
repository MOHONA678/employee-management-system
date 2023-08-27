@extends('layouts.admin')

@section('title')
    {{ __('Manage Schedule') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Manage Schedule') }}</h1>
    <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.create') : route('moderator.schedule.create') ) }}" class="btn btn-primary">
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
        <h5 class="card-title mb-0">{{ __('Working Schedule') }}</h5>
      </div>
        <table class="table table-hover my-0 data-table">
                  
            <thead>
                <tr>
                  <th scope="col" >SL</th>
                  <th scope="col">Title</th>
                  <th scope="col">Time In</th>
                  <th scope="col">Time Out</th>
                  <th scope="col" width="90">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($schedules as $schedule)
                <tr>
                  <td scope="row"> {{ $loop->iteration }} </td>
                  <td> {{ $schedule->title }} </td>
                  <td> {{ $schedule->time_in }} </td>
                  <td> {{ $schedule->time_out }} </td>
                  

                  <td class="d-flex justify-contetn-start">
                    <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.edit', $schedule->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.edit', $schedule->id) : route('moderator.schedule.edit', $schedule->id) ) }}" class="btn btn-outline-success btn-sm mx-2">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.destroy', $schedule->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.destroy', $schedule->id) : route('moderator.schedule.destroy', $schedule->id) ) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-outline-danger btn-sm" onclick="del(event, this)">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  function deleteUser(e, t) {
    e.preventDefault();
    let c = confirm("Are you sure?");
    if (!c) return;
    t.closest('form').submit();
  }
</script>  
@endsection