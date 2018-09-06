@extends('layouts.app-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Admin Panel</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Card -->
                            <div class="card card-block p-30">
                              <div class="counter counter-md text-left">
                                  <div class="counter-label text-uppercase mb-5"><b>Machine</b></div>
                                <div class="counter-number-group mb-10">
                                  <span class="counter-number"><?php //echo $total['note']; ?></span>
                                </div>
                                <div class="counter-label">
                                    <div class="progress progress-xs mb-10">
                                      <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                                        <span class="sr-only">70.3%</span>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                            <div class="counter-number-group">
                                              <span class="counter-icon blue-600 mr-5"><i class="icon wb-mobile"></i></span>                                                                               
                                              <span class="counter-number-related text-right"><a href="{{ url('machine-management') }}">Machine</a></span>
                                            </div>
                                        </div>
                                        <div class="counter counter-sm text-left">
                                            <div class="counter-number-group">
                                              <span class="counter-icon blue-600 mr-5"><i class="icon wb-plus"></i></span>                                                                               
                                              <span class="counter-number-related text-right"><a href="{{ url('machine-management/create') }}">New Machine</a></span>
                                            </div>
                                        </div>
                                        <div class="counter counter-sm text-left">
                                            <div class="counter-number-group">
                                              <span class="counter-icon blue-600 mr-5"><i class="icon wb-menu"></i></span>                                                                               
                                              <span class="counter-number-related text-right"><a href="{{ url('system-management/machine-type') }}">Machine Type</a></span>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-2" style="display:inline-block;">
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-clipboard"></i></span>                                                                                    
                                                <span class="counter-number-related text-right"><a href="{{ url('machine-model') }}">Machine Model</a></span>
                                              </div>
                                        </div>
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('key') }}">Key</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-map"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('key-location') }}">Key Location</a></span>
                                              </div>
                                        </div>
                                    </div>
                                     <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('machine-sizes') }}">Machine Sizes</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-check"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('checklist') }}">Checklist</a></span>
                                              </div>
                                        </div>
                                          <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-list"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('machinemodel-checklist') }}">Machine Model Checklist</a></span>
                                              </div>
                                        </div>
                                    </div>
                                     <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('meters') }}">Meters</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-wrench"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('repair-type') }}">Repair Type</a></span>
                                              </div>
                                        </div> 
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-wrench"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('theme-lists') }}">Themes</a></span>
                                              </div>
                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                            <!-- End Card -->
                          </div>
                        
                        <div class="col-lg-12">
                            <!-- Card -->
                            <div class="card card-block p-30">
                              <div class="counter counter-md text-left">
                                  <div class="counter-label text-uppercase mb-5"><b>Site</b></div>
                                <div class="counter-number-group mb-10">
                                  <span class="counter-number"><?php //echo $total['note']; ?></span>
                                </div>
                                <div class="counter-label">
                                    <div class="progress progress-xs mb-10">
                                      <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                                        <span class="sr-only">70.3%</span>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-map"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('system-management/area') }}">Area</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-globe"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('route') }}">Routes</a></span>
                                              </div>
                                        </div>        
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-list"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('site-type') }}">Site Type</a></span>
                                              </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-dashboard"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('site-group') }}">Site Group</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-user"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('managing-agent') }}">Managing Agents</a></span>
                                              </div>
                                        </div>        
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-stats-bars"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('site') }}">Sites</a></span>
                                              </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="">Site Commission</a></span>
                                              </div>
                                        </div>
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="">SC Tier</a></span>
                                              </div>
                                        </div>        
                                         <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="">SC Tier Processing</a></span>
                                              </div>
                                        </div>  
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                            <!-- End Card -->
                          </div>
                        
                        <div class="col-lg-12">
                            <!-- Card -->
                            <div class="card card-block p-30">
                              <div class="counter counter-md text-left">
                                  <div class="counter-label text-uppercase mb-5"><b>User</b></div>
                                <div class="counter-number-group mb-10">
                                  <span class="counter-number"><?php //echo $total['note']; ?></span>
                                </div>
                                <div class="counter-label">
                                    <div class="progress progress-xs mb-10">
                                      <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                                        <span class="sr-only">70.3%</span>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="col-md-2" style="display:inline-block;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-menu"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('user-mgmt') }}">User List</a></span>
                                              </div>
                                        </div>
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('user-mgmt') }}">User Activity</a></span>
                                              </div>
                                        </div>
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-lock"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('group-permission') }}">Security Permission</a></span>
                                              </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-2" style="display:inline-block;vertical-align: top;">
                                        <div class="counter counter-sm text-left">
                                              <div class="counter-number-group">
                                                <span class="counter-icon blue-600 mr-5"><i class="icon wb-user"></i></span>                                                                                   
                                                <span class="counter-number-related text-right"><a href="{{ url('user-mgmt/create') }}">Add New User</a></span>
                                              </div>
                                        </div>                                        
                                    </div>
                                                                       
                                    
                                </div>
                              </div>
                            </div>
                            <!-- End Card -->
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection