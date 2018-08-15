@extends('layouts.app-template')
@section('content')
<!-- Page -->
<meta http-equiv="refresh" content="300" >
<div class="row" id="boxesCount">   
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b>{{ $online }}</b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-green-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon green-600 mr-5"><i class="wb-graph-up"></i></span>
                    <span class="counter-number-related"><?php if($permit['read']): ?><a href="" data-target=".online-modal-lg" data-toggle="modal"><?php endif; ?>Machine Online<?php if($permit['read']): ?></a><?php endif; ?></span>          </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b>{{ $offline }}</b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon red-600 mr-5"><i class="wb-graph-down"></i></span>
                    <span class="counter-number-related"><?php if($permit['read']): ?><a href="" data-target=".example-modal-lg" data-toggle="modal"><?php endif; ?>Machine Offline <?php if($permit['read']): ?></a><?php endif; ?></span>          </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b>{{ $ttlMachines }}</b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon blue-600 mr-5"><i class="wb-stats-bars"></i></span>
                    <span class="counter-number-related"><?php if($permit['read']): ?><a href="" data-target=".total-modal-lg" data-toggle="modal"><?php endif; ?>Total Machines<?php if($permit['read']): ?></a><?php endif; ?></span>          </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['notice']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-cyan-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                  <div class="counter-number-group"><span class="counter-icon cyan-600 mr-5"><i class="wb-alert-circle"></i></span><a href="{{ url('machine-error-reports?error_msg=3') }}"><span class="counter-number-related">Notice</span>  </a>        </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['warning']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-orange-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                  <div class="counter-number-group"><span class="counter-icon orange-600 mr-5"><i class="wb-warning"></i></span><a href="{{ url('machine-error-reports?error_msg=2') }}"><span class="counter-number-related">Warning</span>   </a>       </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>    
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['error']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon red-600 mr-5"><i class="wb-minus-circle"></i></span><a id="errorTypeFilter" href="{{ url('machine-error-reports?error_msg=1') }}"><span class="counter-number-related">Attention</span> </a>         </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    
    <!-- end boxes -->
    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <header class="panel-heading">
                <h3 class="panel-title">Machine Error Reports</h3>       
            </header>
            
            <form role="form" method="GET" action="{{ route('machine-management.index') }}">
                <div class="row">           
                    <div class="col-md-6">                        
                        <div id="filter_display">   
                            <div class="bootstrap-tagsinput">
                                    <?php if($filterData['startdate'] !=''): ?>
                                        <span class="tag badge badge-default">{{ $filterData['startdate'] }} - {{ $filterData['enddate'] }}</span>                                        
                                    <?php endif; ?>
                                    <?php if($filterData['machine_model'] !=''): ?>
                                        <span class="tag badge badge-default">{{ $filterData['machine_model'] }}</span>                                        
                                    <?php endif; ?>
                                    <?php if($filterData['machine_type'] !=''): ?>
                                        <span class="tag badge badge-default">{{ $filterData['machine_type'] }}</span>                                        
                                    <?php endif; ?>    
                                    <?php if($filterData['error_msg'] !=''): 
                                        if($filterData['error_msg']=='1'){ $error = 'Needs Immediate Attention'; }
                                        if($filterData['error_msg']=='2'){ $error = 'Warning'; }
                                        if($filterData['error_msg']=='3'){ $error = 'Notice'; }  ?>
                                        <span class="tag badge badge-default"><?php echo $error; ?></span>
                                    <?php endif; ?>     
                                    <?php if($filterData['machine_site'] !=''): ?>
                                        <span class="tag badge badge-default">{{ $filterData['machine_site'] }}</span>
                                    <?php endif; ?> 
                               
                            </div>                            
                        </div>
                    </div>                   
                    <div class="col-md-3"></div>
                    <div class="col-md-3 text-right" style="padding-right:3em;"> 
                        <a href="{{ url('history') }}">
                        <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                            <span class="ladda-label">View History<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
                            <span class="ladda-spinner"></span>
                        </button>
                        </a>
                    </div>
                </div>
            </form>
            <div class="row" ng-app="machineApp" ng-controller="machineController">   
                <!-- Team Total Completed -->
                <div class="col-xxl-12">
                    <div id="teamCompletedWidget" class="card card-shadow example-responsive">                       
                 
                        <!-- Example Table section -->
                        <div class="example-wrap" style="margin-bottom:0;">
                          <!-- <h4 class="example-title">Machine LIVE Error Status</h4> -->
                          <div id="success_msg">
                              @if(session()->has('message'))
                                  <div class="alert dark alert-success alert-dismissible" role="alert">{{ session()->get('message') }}</div>
                              @endif
                          </div>
                           <div class="example">   
                            <form role="form" method="GET" class="error-list-form" id="formFilter" style="border-top: 1px solid #e4eaec;padding:0.5em 0;">
                                <div style="width:1.5%;" class="col_empty ky-columns"></div>
                                <div class="col_date ky-columns ky_date">
                                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left">     
                                </div>
                                <div class="col_model ky-columns ky_model">
                                    <select id="m_model" class="form-control" name="machine_model">
                                        <option selected="selected" disabled="" value="A" name="machine_model">Machine Model</option>
                                        <option value="" class="clearFilterOption">------Filter All------</option>
                                        @foreach ($model as $machinelog)
                                        <?php    
                                        if(!empty($_GET)): $sel = ($filterData['machine_model'] == $machinelog->machine_model)? 'selected' : '';
                                        else: $sel= ''; endif;
                                        ?>
                                        <option value="{{ $machinelog->machine_model}}" <?php echo $sel; ?>>{{ $machinelog->machine_model}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col_type ky-columns ky_type">
                                    <select id="m_type" class="form-control" name="machine_type">
                                        <option selected="selected" disabled="" value="B" name="machine_type">Machine Type</option>
                                        <option value="" class="clearFilterOption">------Filter All------</option>
                                        @foreach ($machine_type as $machinelog)
                                        <?php    
                                        if(!empty($_GET)): $sel = ($filterData['machine_type'] == $machinelog->machine_type)? 'selected' : '';
                                        else: $sel= ''; endif;
                                        ?>
                                        <option value="{{ $machinelog->machine_type}}" <?php echo $sel; ?>>{{ $machinelog->machine_type}}</option>
                                        @endforeach                                                                                        
                                    </select>
                                </div>
                                <div class="col_serial ky-columns ky_serial">
                                    <select id="e_serial" class="form-control" disabled="">
                                        <option selected="" disabled=""></option>
                                        <option disabled="">Name & Serial No</option>
                                    </select>
                                </div>
                                <div class="col_error ky-columns ky_error">
                                    <select id="e_msg" class="form-control" name="error_msg">
                                        <option selected="selected" disabled=""><b>Error Message</b></option>  
                                        <option value="" class="clearFilterOption">------Filter All------</option>
                                        <option value="3" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '3')? 'selected' : ''; endif; ?> >Notice</option>
                                        <option value="2" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '2')? 'selected' : ''; endif; ?> >Warning</option>
                                        <option value="1" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '1')? 'selected' : ''; endif; ?> >Needs Immediate Attention</option>
                                    </select>
                                </div>
                                <div class="col_site ky-columns ky_site">
                                    <select id="site" class="form-control" name="machine_site">
                                        <option selected="selected" disabled="" value="C">Site</option>
                                        <option value="" class="clearFilterOption">------Filter All------</option>
                                        @foreach ($site as $machinelog)
                                        <?php    
                                        if(!empty($_GET)): $sel = ($filterData['machine_site'] == $machinelog->site_name)? 'selected' : '';
                                        else: $sel= ''; endif;
                                        ?>
                                        <option value="{{ $machinelog->site_name}}" <?php echo $sel; ?>>{{ $machinelog->site_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col_ins ky-columns"><select id="" class="form-control" name="" disabled=""></select></div>
                                
                                
                           </form>
                            <table class="table table-hover" id="machineErrorReport" style="border-top: 1px solid #e4eaec;">                                    
                                <thead>
                                    <tr role="row">                                                
                                        <th style="width:1%;" class="col_empty"></th>
                                        <th style="width:6.5%;" class="col_date">Date Time</th>
                                        <th style="width:8.2%;" class="col_model">Machine Model</th>                                                
                                        <th style="width:7%;" class="col_type">Machine Type</th>
                                        <th style="width:8.3%;" class="col_serial">Name & Serial No</th>
                                        <th style="width:12%" class="col_error">Error Message</th>
                                        <th style="width:16.52%" class="col_site">Site</th>
                                        <th style="width:5%;" class="">Instances</th>
                                       </tr> 
                                </thead> 
                                    
                                @foreach ($machinelogs as $machinelog)
                                <tbody class="table-section" data-plugin="tableSection" >
                                    <tr>
                                        <td class="text-center">
                                            <?php foreach ($machinelogsgroup as $machineloggroup):
                                                if ($machinelog->error == $machineloggroup->error){  ?>
                                                <i class="table-section-arrow"></i>
                                            <?php break; }
                                            endforeach; ?>
                                        </td>
                                        <td class="text-left"> {{ date('d/m/Y h:i A', strtotime($machinelog->date_created))}} </td>
                                        <td class="font-weight-medium">{{ $machinelog->machine_model}}</td>
                                        <td>{{ $machinelog->machine_type}}</td>
                                        <td class="hidden-sm-down"><span class="text-muted"> {{ $machinelog->comments}} - {{ $machinelog->serial_no}} </span></td>
                                        <td class="hidden-sm-down">
                                            <strong>
                                            <?php if($permit['editAll']): ?>    
                                            <a href="#" data-toggle="modal" data-target="#myModal{{$machinelog->error_id}}" style="text-decoration: none;">
                                            <?php endif; ?>
                                            @if ($machinelog->errortype == '2') 
                                            <span class="badge badge-warning">Warning!</span> 
                                            @endif @if ($machinelog->errortype == '3')
                                            <span class="badge badge-info">Notice!</span> 
                                            @endif

                                            @if ($machinelog->errortype == '1') 
                                            <span class="badge badge-danger" style="font-size: 13px;"> <strong> Needs Immediate Attention!</strong></span> <span class="" sstyle="font-size: 14px;"tyle="font-size: 13px;"> <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?></span> 
                                            @else
                                            <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?>
                                            @endif
                                            <?php if($permit['editAll']): ?>  </a><?php endif; ?></strong>
                                        </td>
                                        <td class="hidden-sm-down">
                                            @if ($machinelog->errortype == '1') {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @else
                                             {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @endif 
                                        </td>
                                        <td class="hidden-sm-down">
                                            <?php
                                            $countarray = array();
                                            $temp=0;
                                            foreach ($machinelogsgroup as $machineloggroup):
                                                   if ($machineloggroup->error == $machinelog->error){ ?>
                                                 <?php 
                                                 $count = 1;
                                                 array_push($countarray, $count); 
                                                 ?>
                                            <?php }
                                                endforeach; ?>
                                                 <span class="text-muted"><?php echo sizeof($countarray);?></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody> 
                                     @foreach ($machinelogsgroup as $machineloggroup)
                                        @if ($machineloggroup->error == $machinelog->error)
                                          <tr>
                                              <td> &nbsp;</td>
                                              <td class="text-left">{{ date('d/m/Y h:i A', strtotime($machineloggroup->created_at))}}</td> 
                                              <td> &nbsp;</td> <td> &nbsp;</td> <td> &nbsp;</td>
                                              <td>
                                                  @if ($machineloggroup->type == '1') 
                                                  <span class="badge badge-danger" > Needs Immediate Attention! </span>
                                                  @endif
                                                  <?php $errorstring =str_replace(",","",$machineloggroup -> error); echo $errorstring;?>
                                              </td>
                                              <td class="hidden-sm-down"></td>
                                              <td class="hidden-sm-down">&nbsp;</td>
                                          </tr>
                                        @endif
                                     @endforeach
                                </tbody>
                                @endforeach
                                <tfoot></tfoot>
                            </table>
                          </div>
                        </div>              
                        <!-- End Example Table-section -->
                    </div>
                    <?php //print_r($machinelogss); ?>
                    <div class="col-sm-12">                                     
                        <div class="dataTables_paginate paging_simple_numbers" id="custom_paging">
                            @if ($machinelogs->lastPage() > 1)
                                <?php
                                    $start = $machinelogs->currentPage() - 3; // show 3 pagination links before current
                                    $end = $machinelogs->currentPage() + 3; // show 3 pagination links after current
                                    if($start < 1) $start = 1; // reset start to 1
                                    if($end >= $machinelogs->lastPage() ) $end = $machinelogs->lastPage(); // reset end to last page
                                    $con = (isset($_GET['error_msg']))? '?error_msg='.$_GET['error_msg'].'&' : '?';                                    
                                    $url = ( $_SERVER['REMOTE_ADDR']== '::1')? 'http://localhost/coinoponlinebeta/public/' : 'https://www.ascentri.com/';
                                ?>
                                <a class="btn btn-xs {{ ($machinelogs->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $machinelogs->url(1) }}"><span>«</span></a>
                                @if($start>1)
                                    <a class="btn btn-xs" href="{{ $machinelogs->url(1) }}">{{1}}</a> ...
                                @endif
                                @for ($i = $start; $i <= $end; $i++)
                                <a class="btn btn-xs {{ ($machinelogs->currentPage() == $i) ? ' active' : '' }}" href="<?php echo $url.'machine-error-reports'.$con.'page='; ?>{{$i}}">{{$i}}</a>
                                @endfor
                                @if($end<$machinelogs->lastPage())
                                   ... <a class="btn btn-xs" href="<?php echo $url.'machine-error-reports'.$con.'page='.$machinelogs->lastPage(); ?>">{{$machinelogs->lastPage()}}</a>
                                @endif
                                <a class="btn btn-xs {{ ($machinelogs->currentPage() == $machinelogs->lastPage()) ? ' disabled' : '' }}" href="{{ $machinelogs->url($machinelogs->currentPage()+1) }}"><span>»</span></a>
                            @endif
                        </div>   <br>                         
                    </div>
                </div>
                <!-- End Team Total Completed -->
                <!-- End First Row -->

            </div>
        </div>
    </div>
    <!-- End Second Row -->

</div>


@foreach ($machinelogs as $machinelog)
<div id="myModal{{$machinelog -> error_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        Modal content
        <form action="{{ URL::to('machine-error-reports/update_error_status') }}" method="post" id="status-update" >   
        <meta id="token" name="token" content="{ { csrf_token() } }">     
        {{ csrf_field() }}   
        <input type="hidden" name="errorid" value="{{ $machinelog->error_id }} ">
                            
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                <h4 class="modal-title">Error Type: 
                <div id="md-msg"></div>
                
                @if ($machinelog->errortype == "1")
                   <span class="badge badge-danger">Needs Immediate Attention!</span> 
                @endif
                
                @if ($machinelog->errortype == "2")
                <span class="badge badge-warning">Warning!</span>
                @endif
                
                @if ($machinelog->errortype == "3")
                   <span class="badge badge-info">Notice!</span> 
                @endif

                                                        
                
                </h4>
            </div>
            <div class="modal-body">
                <p><strong>Error Message: <?php $errorstring = str_replace(",","",$machinelog -> error); echo $errorstring;?></strong></p>
                <p>Name and Serial No:  {{ $machinelog->comments}} - {{ $machinelog->serial_no}} </p> 
                <p>Machine Type:  {{ $machinelog->machine_type}} </p>
                 <p>Machine Model: {{ $machinelog->machine_model}} </p>
                 <p>Site Address:  {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} </p>
                 <p>  <input type="checkbox" id="error-resolve" name="resolve" value="2" > Resolve</p>
                 <input type="hidden" id="resolve-by" name="resolve_by" value="{{ $userID }}" >
            </div>
            <div class="modal-footer">
                 <input class="btn btn-primary" type="submit" value="Update" />
                 <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
            
        </div>
    </form>
    </div>
</div>
@endforeach


<!-- Modal -->
<div class="modal fade example-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Offline Machine</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Site</th><th>Area</th></tr></thead>
            <tbody>
              @foreach ($offlineList as $lists)                      
                <tr>                            
                    <td width="5%"><i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td width="9%">{{ $lists->state }}</td>
                    <td width="25%">{{ $lists->machine_model }}</td>
                    <td width="20%"><a href="machine-management/show/{{ $lists->id }}">{{ $lists->comments }} - {{ $lists->machine_serial_no }}</a></td>
                    <td  style="width:30% !important;">{{ $lists->site }}</td>      
                    <td>{{ $lists->area }}</td>   
                </tr>                          
              @endforeach   
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade online-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Online Machine</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Site</th><th>Area</th></tr></thead>
            <tbody>
              @foreach ($onlineLists as $lists)                      
                <tr>                            
                    <td width="5%"><i class="icon wb-check-circle ml-10 green-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td width="9%">{{ $lists->state }}</td>
                    <td width="25%">{{ $lists->machine_model }}</td>
                    <td width="20%"><a href="machine-management/show/{{ $lists->id }}">{{ $lists->comments }} - {{ $lists->machine_serial_no }}</a></td>
                    <td style="width:30% !important;">{{ $lists->site }}</td>      
                    <td>{{ $lists->area }}</td>                                   
                </tr>                          
              @endforeach   
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade total-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Online Machine</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Site</th><th>Area</th></tr></thead>
            <tbody>
              @foreach ($totalLists as $lists)                      
                <tr>                            
                    <td width="5%">
                        <?php if($lists->status =='1'){ ?>
                        <i class="icon wb-check-circle ml-10 green-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php }else{ ?>
                        <i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php } ?>
                    </td> 
                    <td width="9%">{{ $lists->state }}</td>
                    <td width="25%">{{ $lists->machine_model }}</td>
                    <td width="20%"><a href="machine-management/show/{{ $lists->id }}">{{ $lists->comments }} - {{ $lists->machine_serial_no }}</a></td>
                    <td style="width:30% !important;">{{ $lists->site }}</td>      
                    <td>{{ $lists->area }}</td>                                  
                </tr>                          
              @endforeach   
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>    
$(document).ready(function() {   

    $("#status-update").submit(function(e) {
        e.preventDefault();

        $('.modal-dialog').css('text-align','center');
        $('.modal-dialog').html('<img src="https://www.ascentri.com/global/photos/loading.gif" width="60px">');            

        var statusval = $("input#error-resolve").val();            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: $(this).serialize(),
                success: function(response){                     
                $('.modal-dialog').html('<div class="alert dark alert-success alert-dismissible" role="alert">Resolve Successfully!</div>'); 
                setTimeout(function() { location.reload(); }, 1000);                      
            },
            error: function(response){
                $('.modal-dialog').html('<div class="alert dark alert-danger alert-dismissible" role="alert">Error!</div>');
            }
        }); 
    });
    
    //Machine error report filter
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports'); form.submit();
    });
    $('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports'); form.submit();
    });  
    
    $("#m_model").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });   
    $("#m_type").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });   
    $("#e_msg").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });
    $("#site").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });    
    $("#max-date").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });
    
    $("#m_model").select2();
    $("#m_type").select2();
    $("#e_msg").select2();
    $("#site").select2();
    
});


</script>

@endsection

