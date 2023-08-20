<aside id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">HRMS</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
          <i class="align-middle" data-feather="sliders"></i>
          <span class="align-middle">{{ __('Dashboard') }}</span>
        </a>
      </li>
      <li class="sidebar-header">{{ __('User Management') }}</li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('user.index') }}">
          <i class="fas fa-user align-middle"></i>
          <span class="align-middle">{{ __('Manage Users') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('roles.index') }}">
          <i class="fas fa-user-shield align-middle"></i>
          <span class="align-middle">{{ __('User Settings') }}</span>
        </a>
      </li>

      <li class="sidebar-header">{{ __('Employee Management') }}</li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('employee.index') }}">
          <i class="fa-solid fa-users-viewfinder"></i>
          <span class="align-middle">{{ __('Manage Employees') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('department.index') }}">
          <i class="fa-solid fa-file-pen"></i>
          <span class="align-middle">{{ __('Manage Departments') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('designation.index') }}">
          <i class="fa-solid fa-file-pen"></i>
          <span class="align-middle">{{ __('Manage Designations') }}</span>
        </a>
      </li>
      <li class="sidebar-header">{{ __('Attendance') }}</li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('schedule.index') }}">
          <i class="fa-solid fa-clock"></i>
          <span class="align-middle">{{ __('Schedule') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('attendance.index') }}">
          <i class="fa-solid fa-calendar-days"></i>
          <span class="align-middle">{{ __('Daily Attendance') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('sheet.report') }}">
          <i class="fa-solid fa-triangle-exclamation"></i>
          <span class="align-middle">{{ __('Sheet Report') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('sheet.report') }}">
          <i class="fa-solid fa-stopwatch"></i>
          <span class="align-middle">{{ __('Over Time') }}</span>
        </a>
      </li>
      
      <li class="sidebar-header">{{ __('Leave Management') }}</li>      
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('leave.index') }}">
          <i class="fa-solid fa-person-walking-arrow-right"></i>
          <span class="align-middle">{{ __('Manage Leaves') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('leave.create') }}">
          <i class="fa-solid fa-file-pen"></i>
          <span class="align-middle">{{ __('Registration') }}</span>
        </a>
      </li>
      <li class="sidebar-header">{{ __('Payroll System') }}</li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.index') }}">
          <i class="fa-solid fa-file"></i>
          <span class="align-middle">{{ __('Manage Payroll') }}</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.create') }}l">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Generate Payroll') }}</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>