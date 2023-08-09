<aside id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">AdminKit</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item">
                {{-- <a class="sidebar-link" href="{{ url('/admin/category') }}"> --}}
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
            </li>

            <li class="sidebar-header">{{ __('Employee Management') }}</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('employee.index') }}">
      <i class="align-middle" data-feather="square"></i> <span class="align-middle">Manage Employees</span>
    </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('department.index') }}">
      <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Manage Departments') }}</span>
    </a>
            </li>

            <li class="sidebar-header">{{ __('Attendance') }}</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('attendance.index') }}">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Daily Attendance') }}</span>
  </a>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="javascript:void(0)">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Attendance Reports') }}</span>
  </a>
          </li>

            <li class="sidebar-header">{{ __('Leave Management') }}</li>

            
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('leave.index') }}">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Manage Leaves') }}</span>
  </a>
          </li>
          <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('leave.create') }}">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Registration') }}</span>
  </a>
          </li>
            
            <li class="sidebar-header">{{ __('Payroll') }}</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('payroll.index') }}">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Manage Payroll') }}</span>
  </a>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('payroll.create') }}l">
    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">{{ __('Generate Payroll') }}</span>
  </a>
          </li>
        </ul>
    </div>
</aside>