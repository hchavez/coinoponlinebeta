 <div class="page-aside">
      <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
          <div data-role="content">
            <section class="page-aside-section">
              <h5 class="page-aside-title">Main{{ Route::current()->getName() }}</h5>
              <div class="list-group">
                <a class="list-group-item {{ Route::current()->getName() == 'machine-type.index' ? 'list-group-item-action active' : '' }}" href="{{ url('system-management/machine-type') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Machine Type</a>
                <a class="list-group-item {{ Route::current()->getName() == 'machine-model.index' ? 'list-group-item-action active' : '' }}" href="{{ url('system-management/machine-model') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Machine Model</a>
                <a class="list-group-item {{ Route::current()->getName() == 'site-management.index' ? 'list-group-item-action active' : '' }}" href="{{ url('system-management/site') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Sites</a>
                <a class="list-group-item {{ Route::current()->getName() == 'site-group.index' ? 'list-group-item-action active' : '' }}" href="{{ url('system-management/site-group') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Site Group</a>
                <a class="list-group-item {{ Route::current()->getName() == 'site-type.index' ? 'list-group-item-action active' : '' }}" href="{{ url('system-management/site-type') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Site Type</a>
                <a class="list-group-item {{ Route::current()->getName() == 'area.index' ? 'list-group-item-action active' : '' }}" href=" {{ url('system-management/area') }}"><i class="icon wb-heart" aria-hidden="true"></i>Area</a>
                <a class="list-group-item {{ Route::current()->getName() == 'routes.index' ? 'list-group-item-action active' : '' }}" href=" {{ url('system-management/route') }}"><i class="icon wb-heart" aria-hidden="true"></i>Routes</a>

                <a class="list-group-item {{ Route::current()->getName() == 'user-management.index' ? 'list-group-item-action active' : '' }}" href="{{ url('user-mgmt') }}"><i class="icon wb-dashboard" aria-hidden="true"></i>Users</a>
                <a class="list-group-item {{ Route::current()->getName() == 'user-access.index' ? 'list-group-item-action active' : '' }}" href=" {{ url('system-management/user-access') }}"><i class="icon wb-pluse" aria-hidden="true"></i>User Access</a>
                <a class="list-group-item {{ Route::current()->getName() == 'city.index' ? 'list-group-item-action active' : '' }}" href=" {{ url('system-management/city') }}"><i class="icon wb-folder" aria-hidden="true"></i>City</a>
                <a class="list-group-item {{ Route::current()->getName() == 'state.index' ? 'list-group-item-action active' : '' }}" href=" {{ url('system-management/state') }}"><i class="icon wb-folder" aria-hidden="true"></i>State</a>
              </div>
            </section>
            <section class="page-aside-section">
              <h5 class="page-aside-title">Filter</h5>
              <div class="list-group">
                <a class="list-group-item" href=" {{ url('system-management/state') }}"><i class="icon wb-image" aria-hidden="true"></i>Others</a>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
