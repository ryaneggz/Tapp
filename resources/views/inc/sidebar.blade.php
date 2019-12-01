<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        
        <!-- Timecard Dropdown -->
        <li>
          <a href="#subPagesTimecards" data-toggle="collapse" class="collapsed"><i class="lnr lnr-clock"></i> <span>Timecards</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="subPagesTimecards" class="collapse ">
            <ul class="nav">
              <li><a href="/timecards" class=""><i class="lnr lnr-menu-circle"></i> <span>View Timecards</span></a></li>
              @if($admin)
                <li><a href="/timecards/create" class=""><i class="lnr lnr-plus-circle"></i> <span>Create Timecard</span></a></li>
              @endif
            </ul>
          </div>
        </li>
        <!-- End Timecard Dropdown -->

        <!-- Summary Dropdown -->
        <li>
          <a href="#subPagesSummaries" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pencil"></i> <span>Summaries</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="subPagesSummaries" class="collapse ">
            <ul class="nav">
              <li><a href="/summaries" class=""><i class="lnr lnr-menu-circle"></i> <span>View Summaries</span></a></li>
              @if($employee)
                <li><a href="/summaries/create" class=""><i class="lnr lnr-plus-circle"></i> <span>Create Summary</span></a></li>
              @endif
            </ul>
          </div>
        </li>
        <!-- End Summary Dropdown -->

        @if($admin)
          <!-- Employee Dropdown -->
          <li>
            <a href="#subPagesEmployees" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Employees</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPagesEmployees" class="collapse ">
              <ul class="nav">
                <li><a href="/employees" class=""><i class="lnr lnr-menu-circle"></i> <span>View Employees</span></a></li>
                <li><a href="/employees/create" class=""><i class="lnr lnr-plus-circle"></i> <span>Create Employee</span></a></li>
              </ul>
            </div>
          </li>
          <!-- End Employee Dropdown -->
        @endif

        @if($admin)
          <!-- Report Dropdown -->
          <li>
            <a href="#subPagesReports" data-toggle="collapse" class="collapsed"><i class="lnr lnr-book"></i> <span>Reports</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPagesReports" class="collapse ">
              <ul class="nav">
                <li><a href="/reports" class=""><i class="lnr lnr-menu-circle"></i> <span>View Reports</span></a></li>
              </ul>
            </div>
          </li>
          <!-- End Report Dropdown -->
        @endif

        @if($admin)
          <!-- Admin Dropdown -->
          <li>
            <a href="#subPagesAdmins" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Admins</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPagesAdmins" class="collapse ">
              <ul class="nav">
                <li><a href="/admins" class=""><i class="lnr lnr-menu-circle"></i> <span>View Admins</span></a></li>
                <li><a href="/admins/create" class=""><i class="lnr lnr-plus-circle"></i> <span>Create Admins</span></a></li>
              </ul>
            </div>
          </li>
          <!-- End Admin Dropdown -->
        @endif

        @if($admin)
          <!-- User Dropdown -->
          <li>
            <a href="#subPagesUsers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPagesUsers" class="collapse ">
              <ul class="nav">
                <li><a href="/users" class=""><i class="lnr lnr-menu-circle"></i> <span>View Users</span></a></li>
              </ul>
            </div>
          </li>
          <!-- End User Dropdown -->
        @endif

        <!-- Settings Dropdown -->
        <li>
          <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="subPages" class="collapse ">
            <ul class="nav">
              <li><a href="/profile" class="">Profile</a></li>
              @if($admin)
                <li><a href="/timecards/kiosk" class="">Kiosk</a></li>
              @endif
              {{-- <li><a href="/users" class="">Users</a></li> --}}
              <li><a href="/lock" class="">Lockscreen</a></li>
            </ul>
          </div>
        </li>
        <!-- End Settings Dropdown -->

      </ul>
    </nav>
  </div>
</div>