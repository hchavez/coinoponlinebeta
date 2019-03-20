<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation"    >
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center" href="<?php echo url('/'); ?>">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="{{ asset("/assets/images/logo.png") }}"
                 title="Remark">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="{{ asset("/assets/images/logo-blue.png") }}"
                 title="Remark">
            <span class="navbar-brand-text hidden-xs-down"> Coinop</span>
        </a>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                            <img src="{{ asset("/global/portraits/5.jpg") }}" alt="...">
                            <i></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        @if (Auth::guest())
                        <a class="dropdown-item" href="{{ url('login') }}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Login</a>
                        @else
                        <a class="dropdown-item" href="{{ url('profile') }}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                        <a class="dropdown-item" href="#" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" role="menuitem"><i class="icon wb-power" aria-hidden="true" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i> Logout</a>
                        @endif 
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                       aria-expanded="false" data-animation="scale-up" role="button">
                        <i class="icon wb-bell" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-danger up">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <div class="dropdown-menu-header">
                            <h5>NOTIFICATIONS</h5>
                            <span class="badge badge-round badge-danger">New 5</span>
                        </div>
                        <div class="list-group">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">A new order has been placed</h6>
                                                <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Completed the task</h6>
                                                <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Settings updated</h6>
                                                <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Event started</h6>
                                                <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Message received</h6>
                                                <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon md-settings" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                All notifications
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                       aria-expanded="false" data-animation="scale-up" role="button">
                        <i class="icon wb-envelope" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-info up">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <div class="dropdown-menu-header" role="presentation">
                            <h5>MESSAGES</h5>
                            <span class="badge badge-round badge-info">New 3</span>
                        </div>
                        <div class="list-group" role="presentation">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <span class="avatar avatar-sm avatar-online">
                                                    <img src="{{ asset("/global/portraits/2.jpg") }}" alt="..." />
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Mary Adams</h6>
                                                <div class="media-meta">
                                                    <time datetime="2017-06-17T20:22:05+08:00">30 minutes ago</time>
                                                </div>
                                                <div class="media-detail">Anyways, i would like just do it</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <span class="avatar avatar-sm avatar-off">
                                                    <img src="{{ asset("/global/portraits/3.jpg") }}" alt="..." />
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Caleb Richards</h6>
                                                <div class="media-meta">
                                                    <time datetime="2017-06-17T12:30:30+08:00">12 hours ago</time>
                                                </div>
                                                <div class="media-detail">I checheck the document. But there seems</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <span class="avatar avatar-sm avatar-busy">
                                                    <img src="{{ asset("/global/portraits/4.jpg") }}" alt="..." />
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">June Lane</h6>
                                                <div class="media-meta">
                                                    <time datetime="2017-06-16T18:38:40+08:00">2 days ago</time>
                                                </div>
                                                <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <span class="avatar avatar-sm avatar-away">
                                                     <img src="{{ asset("/global/portraits/5.jpg") }}" alt="..." />
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Edward Fletcher</h6>
                                                <div class="media-meta">
                                                    <time datetime="2017-06-15T20:34:48+08:00">3 days ago</time>
                                                </div>
                                                <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer" role="presentation">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon wb-settings" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                See all messages
                            </a>
                        </div>
                    </div>
                </li>

            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    </div>
</nav>


<div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">General</li>
                    <li class="dropdown site-menu-item has-sub {{ Route::current()->getName() == '' ? 'active' : '' }}">
                        <a data-toggle="dropdown" href="<?php echo url('/'); ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>      
                        </a>
                    </li> 
                    
                    <li class="dropdown site-menu-item has-sub">
                        <a class="animsition-link" href="{{ url('site') }}">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Sites</span>            
                        </a>     
                      
                    </li>
                    
                     
                    <li class="dropdown site-menu-item has-sub">
                        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Machines</span>            
                        </a>     
                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list scrollable is-enabled scrollable-vertical" style="position: relative;">
                                <div class="scrollable-container">
                                    <div class="scrollable-content">
                                        <ul class="site-menu-sub site-menu-normal-list">
                                             <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('machine-management') }}">
                                                    <span class="site-menu-title">Machines List</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('machines-mgmt/reports') }}">
                                                    <span class="site-menu-title">Machines Reports</span>
                                                </a>
                                            </li>
                                         
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('machine-management/create') }}">
                                                    <span class="site-menu-title">New Machine</span>
                                                </a>
                                            </li>                                        

                                        </ul>
                                    </div>
                                </div>
                                <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
                        </div>
                    </li>
                    
                    <li class="dropdown site-menu-item has-sub">
                        <a  class="animsition-link" href="{{ url('prizes') }}">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Prizes</span>            
                        </a>     
                  
                    </li>
                    
                    <li class="dropdown site-menu-item has-sub">
<!--                        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">-->
                        <a class="animsition-link" href="{{ url('themes') }}">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Themes</span>            
                        </a> 
                        
<!--                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list scrollable is-enabled scrollable-vertical" style="position: relative;">
                                <div class="scrollable-container">
                                    <div class="scrollable-content">
                                        <ul class="site-menu-sub site-menu-normal-list">
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('system-management/machine-type') }}">
                                                    <span class="site-menu-title">Themes</span>
                                                </a>
                                            </li>
                                           
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('system-management/area') }}">
                                                    <span class="site-menu-title">Machine Model Theme</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('system-management/route') }}">
                                                    <span class="site-menu-title">Theme Machine Model</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
                        </div>-->
                        
                    </li>
                    
                    
                    <!--li class="dropdown site-menu-item has-section has-sub">
                        <a data-toggle="dropdown" href="{{ url('machine-error-reports') }}" data-dropdown-toggle="false">
                            <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                            <span class="site-menu-title">Reports</span>
                        </a>
                    </li-->
                            <?php
                    
                    $basedatefrom = date('Y-m-d H:i:s', strtotime(now()));
                    $basedateto = date('Y-m-d H:i:s', strtotime(now() . ' +1 day'));
                    //echo $basedatefrom."--".$basedateto;
                    
                    $frm_m = date('m', strtotime($basedatefrom));
                    $frm_d = date('d', strtotime($basedatefrom));
                    $frm_y = date('Y', strtotime($basedatefrom));
                    // echo $frm_m."--".$frm_d."--".$frm_y;
                     
                    $to_m = date('m', strtotime($basedateto));
                    $to_d = date('d', strtotime($basedateto));
                    $to_y = date('Y', strtotime($basedateto));
                    $t="%2F";
                    //$query = "?dateRange=01%2F03%2F2019+-+01%2F04%2F2019";
                    $query = "?dateRange=".$frm_m."".$t."".$frm_d."".$t."".$frm_y."+-+".$to_m."".$t."".$to_d."".$t."".$to_y;
                     $days = "?days=7";
                    //echo $query;
                    ?>  
                    <li class="dropdown site-menu-item has-sub">
                        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Reports</span>            
                        </a>     
                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list scrollable is-enabled scrollable-vertical" style="position: relative;">
                                <div class="scrollable-container">
                                    <div class="scrollable-content">
                                        <ul class="site-menu-sub site-menu-normal-list">
                                             <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('machine-error-reports') }}">
                                                    <span class="site-menu-title">Machine Error Reports</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a  class="animsition-link"  href="{{ url('error-history') }}<?php echo $query; ?>">
                                                    <span class="site-menu-title">History Error Reports</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a  class="animsition-link"  href="{{ url('advam-notap') }}<?php echo $days; ?>">
                                                    <span class="site-menu-title">Advam No-Taps</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('machine-error-reports/advam-watchlist') }}">
                                                    <span class="site-menu-title">Advam Watchlists</span>
                                                </a>
                                            </li>
<!--                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('financial-reports-graph') }}">
                                                    <span class="site-menu-title">Financial Reports</span>
                                                </a>
                                            </li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
                        </div>
                    </li>
                    <?php //if($userRole=='1'): ?>
                    <li class="dropdown site-menu-item has-sub">
                        <a  class="animsition-link" href="{{ url('admin-panel') }}">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Admin Panel</span>            
                        </a>    
                    </li>
                    <?php //endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

