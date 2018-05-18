@extends('layouts.app-template')
@section('content')
<!-- Page -->

<meta http-equiv="refresh" content="300" >
<div class="row">
    <div class="col-xl-6 col-lg-12">
        <!-- Card -->
        <div class="card-group">
          <div class="card card-block p-0">
            <div class="counter counter-md vertical-align bg-white h-300">
              <div class="counter-icon p-30 green-600" style="position:absolute;top:0;left:0;">
                <i class="icon wb-stats-bars" aria-hidden="true"></i>
              </div>
              <div class="counter-number-group font-size-30 vertical-align-middle">
                
                <span class="counter-number">{{ $numMachine }}</span>
                <span class="counter-number-related"></span>
                <div class="font-size-20 mt-3">Number of Machines</div>
                <div class="font-size-10 mt-3"><a href="{{ url('system-management/machine-type') }}">View Machines</a></div>
              </div>
            </div>
          </div>
          <div class="card card-block p-0">
            <div class="counter counter-md vertical-align bg-blue-700 white p-30 h-300">
              <div class="counter-icon p-30 white-600" style="position:absolute;top:0;left:0;">
                <i class="icon wb-stats-bars" aria-hidden="true"></i>
              </div>
              <div class="counter-number-group font-size-30 vertical-align-middle white">
                
                <span class="counter-number"><?php echo $total['coin']; ?></span>
                <span class="counter-number-related"></span>
                <div class="font-size-20 mt-3">Income Coin</div>
                <div class="font-size-10 mt-3"><?php echo date('F'); ?> 2018</div>
                <div class="font-size-10 mt-3"><a href="" class="white">View Report</a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->
    </div>
    <div class="col-xl-6 col-lg-12 masonry-item">
            <!-- Panel Projects -->
            <div class="panel" id="projects">
              <div class="panel-heading">
                <h3 class="panel-title">Machine Error Lists</h3>
                <div class="panel-actions panel-actions-keep">
                  <div class="dropdown">                          
                    <a href="{{ url('machine-error-reports') }}" class="panel-action">
                        <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                            <span class="ladda-label">View All<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
                        <span class="ladda-spinner"></span></button>
                    </a> 
                  </div>
                </div>
              </div>
              <div class="table-responsive h-300 scrollable is-enabled scrollable-vertical" data-plugin="scrollable" style="position: relative;">
                <div data-role="container" class="scrollable-container" style="height: 300px; width: 924px;">
                  <div data-role="content" class="scrollable-content" style="width: 907px;">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                            <th>Date</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Name & Serial No</th>
                            <th>Error Messages</th>
                            <th>Site</th>
                            <th>Instances</th>
                        </tr>
                      </thead>
                      @foreach ($machinelogs as $machinelog)
                        <tbody class="table-section" data-plugin="tableSection" >
                          <tr>                  
                            <td class="text-left"> {{ date('d/m/Y h:i A', strtotime($machinelog->date_created))}} </td>
                                <td class="font-weight-medium">
                                    {{ $machinelog->machine_model}} 
                                </td>
                            <td>
                            {{ $machinelog->machine_type}}
                            </td>
                            <td class="hidden-sm-down">
                              <span class="text-muted"> {{ $machinelog->comments}} - {{ $machinelog->serial_no}} </span>
                            </td>
                            <td class="hidden-sm-down">
                              <strong><a href="#" data-toggle="modal" data-target="#myModal{{$machinelog->error_id}}" style="text-decoration: none;">

                                  @if ($machinelog->errortype == '2') 
                                  <span class="badge badge-warning">Warning!</span> 
                                  @endif @if ($machinelog->errortype == '3')
                                  <span class="badge badge-info">Notice!</span> 
                                  @endif

                                  @if ($machinelog->errortype == '1') 
                                  <span class="badge badge-danger blink_me" style="font-size: 13px;"> <strong> Needs Immediate Attention!</strong></span> <span class="blink_me" sstyle="font-size: 14px;"tyle="font-size: 13px;"> <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?></span> 
                                  @else
                                  <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?>
                                  @endif
                                   </a></strong>
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
                                   endforeach;?>
                                    <span class="text-muted"><?php echo sizeof($countarray);?></span>
                            </td>
                        </tr>
                        </tbody>

                        <tbody> 
                             @foreach ($machinelogsgroup as $machineloggroup)
                                @if ($machineloggroup->error == $machinelog->error)
                             <tr>
                              <td> &nbsp;</td>
                                <td class="text-left">
                                   {{ date('d/m/Y h:i A', strtotime($machineloggroup->created_at))}}
                               </td> <td> &nbsp;</td> <td> &nbsp;</td> <td> &nbsp;</td>
                               <td>
                                  @if ($machineloggroup->type == '1') 
                                  <span class="badge badge-danger" > Needs Immediate Attention! </span>
                                  @endif
                                  <?php $errorstring =str_replace(",","",$machineloggroup -> error); echo $errorstring;?>
                               </td>
                               <td class="hidden-sm-down">

                               </td>
                               <td class="hidden-sm-down">
                                   &nbsp;
                               </td>
                             </tr>
                                @endif
                             @endforeach
                        </tbody>
                        @endforeach
                    </table>
                </div>
                </div>
              </div><!--table responsive end-->
            </div>
            <!-- End Panel Projects -->
          </div>
    
    
    <!-- First Row -->
   <!--div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-warning">
                    <i class="icon wb-shopping-cart"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL PLAY</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">399</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-danger">
                    <i class="icon fa-dollar"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL MONEY</span>
                <div class="content-text text-center mb-0">
                    <i class="text-success icon wb-triangle-down font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">$18,628</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon wb-eye"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL WIN</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">23,456</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-primary">
                    <i class="icon wb-user"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL GOAL</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">4,367</span>
                </div>
            </div>
        </div>
    </div--> 
    <!-- End First Row -->
    <!-- second Row -->
    
    <!-- End Second Row -->

</div>
<div class="row">
    <div class="col-xl-6 col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">Income Note</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number"><?php echo $total['note']; ?></span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-10">
                        <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                          <span class="sr-only">70.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon blue-600 mr-5"><i class="icon wb-calendar"></i></span>
                          <span class="counter-number"></span>
                          <span class="counter-number-related"><?php echo date('F'); ?> 2018</span>
                          <span class="counter-number-related text-right"><a href="">View Report</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">Income Tap</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number"><?php echo $total['tap']; ?></span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-5">
                        <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="20.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                          <span class="sr-only">20.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon red-600 mr-5"><i class="icon wb-calendar"></i></span>
                          <span class="counter-number"></span>
                          <span class="counter-number-related"><?php echo date('F'); ?> 2018</span>
                          <span class="counter-number-related text-right"><a href="">View Report</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">Title Income</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number">2,381</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-5">
                        <div class="progress-bar progress-bar-info bg-green-600" aria-valuenow="20.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                          <span class="sr-only">20.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon green-600 mr-5"><i class="icon wb-calendar"></i></span>
                          <span class="counter-number"></span>
                          <span class="counter-number-related">January - May 2018</span>
                          <span class="counter-number-related text-right"><a href="">View Report</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">Number of Text</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number">2,381</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-5">
                        <div class="progress-bar progress-bar-info bg-orange-600" aria-valuenow="20.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar">
                          <span class="sr-only">20.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon orange-600 mr-5"><i class="icon wb-calendar"></i></span>
                          <span class="counter-number"></span>
                          <span class="counter-number-related">January - May 2018</span>
                          <span class="counter-number-related text-right"><a href="">View Report</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
          </div>
    
    
    <div class="col-lg-6 masonry-item">
        <!-- Panel Last threads -->
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="panel-title-icon icon wb-chat-group" aria-hidden="true"></i>User Activity</h3>
            <div class="panel-actions panel-actions-keep">
              <div class="dropdown">
                <a href="{{ url('logActivity') }}" class="panel-action">
                    <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                        <span class="ladda-label">View All<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
                    <span class="ladda-spinner"></span></button>
                </a>   
              </div>
            </div>
          </div>
          <div class="panel-body h-300 scrollable is-enabled scrollable-vertical" data-plugin="scrollable">
            <div data-role="container" class="scrollable-container" style="height: 270px; width: 924px;">
              <div data-role="content" class="scrollable-content" style="width: 907px;">
                <ul class="list-group list-group-dividered list-group-full">
                    @foreach($logs as $key => $log)
                    <li class="list-group-item">
                      <div class="media">
                        <div class="pr-20">
                          <a class="avatar avatar-online" href="javascript:void(0)">                           
                            <i></i>
                          </a>
                        </div>
                        <div class="media-body">
                          <small class="float-right">{{ $log->updated_at }}</small>
                          <h5 class="mt-0 mb-5">{{ $log->username }} {{ $log->subject }} </h5>
                          <small>{{ $log->url }} <a class="badge badge-outline badge-default" href="javascript:void(0)" title="">{{ $log->ip }}</a></small>
                        </div>
                      </div>
                    </li>
                    @endforeach                   
                </ul>
              </div>
            </div>
          <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 167.586px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
        </div>
        <!-- End Panel Last threads -->
      </div>
</div>

@foreach ($machinelogs as $machinelog)

<div id="myModal{{$machinelog -> error_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        Modal content
        <form action="{{ URL::to('dashboard/update_error_status') }}" method="post" id="status-update" >   
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
                    <span class="badge badge-warning">Warning!</span
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

});


</script>

@endsection

