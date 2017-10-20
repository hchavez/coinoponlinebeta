  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Route::current()->getName() == '' ? 'active' : '' }}">
            <a href="/coinopmachineonline/public"><i class="fa fa-home fa-fw"></i> <span>Dashboard </span></a>
        </li>
        <li class="{{ Route::current()->getName() == 'machine-management.index' ? 'active' : '' }}"> 
        <a href="{{ url('machine-management') }}"><i class="fa fa-book fa-fw"></i> <span>Machine Management </span></a>
        </li>
 
        <li class="{{ Route::current()->getName() == 'state.index' || Route::current()->getName() == 'city.index' ? 'treeview active' : '' }}">
          <a href="#"><i class="fa fa-cog fa-fw"></i> <span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> <!--
            <li class="{{ Route::current()->getName() == 'department.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/department') }}">Department {{ Route::current()->getName() }}</a>
            </li>
            <li class="{{ Route::current()->getName() == 'division.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/division') }}">Division  {{ Route::current()->getName() }}</a>
            </li>
            <li class="{{ Route::current()->getName() == 'country.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/country') }}">Country {{ Route::current()->getName() }}</a>
            </li> -->
            <li class="{{ Route::current()->getName() == 'state.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/state') }}">State </a>
            </li>
            <li class="{{ Route::current()->getName() == 'city.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/city') }}">City</a>
            </li> <!--
            <li class="{{ Route::current()->getName() == 'report.index' ? 'active' : '' }}">
                <a href="{{ url('system-management/report') }}">Report</a>
            </li> -->
          </ul>
        </li>
        <li class="{{ Route::current()->getName() == 'user-management.index' ? 'active' : '' }}">
            <a href="{{ route('user-management.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>