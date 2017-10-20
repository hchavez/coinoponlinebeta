<div class="page-aside">
    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>
    <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
            <div data-role="content">

                <section class="page-aside-section">
                    <h5 class="page-aside-title">Sites </h5>
                    <div class="list-group">
                        <a class="list-group-item {{ Route::current()->getName() == 'area.index' ? 'list-group-item-action active' : '' }}" href="{{ url('area') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Area
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'route.index' ? 'list-group-item-action active' : '' }}" href="{{ url('route') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Routes
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'site-type.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site-type') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Site Type
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'site-group.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site-group') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Site Group
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'managing-agent.index' ? 'list-group-item-action active' : '' }}" href="{{ url('managing-agent') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Managing Agents
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'site.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Sites
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'sites-commission.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site-commision') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Site Commission
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'sites-commission.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site-commision') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>SC Tier
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'sites-commission.index' ? 'list-group-item-action active' : '' }}" href="{{ url('site-commision') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>SC Tier Processing
                        </a>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>





