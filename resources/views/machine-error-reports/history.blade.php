@extends('layouts.app-template')
@section('content')
<!-- Page -->
<meta http-equiv="refresh" content="300" >
<div class="row" id="boxesCount">  
    <!--div class="col-lg-2">        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['notice']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-cyan-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                  <div class="counter-number-group"><span class="counter-icon cyan-600 mr-5"><i class="wb-alert-circle"></i></span><a href="{{ url('history?error_msg=3') }}"><span class="counter-number-related">Notice Resolved</span>  </a>        </div>
              </div>
            </div>
          </div>
        </div>       
    </div>
    <div class="col-lg-2">      
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['warning']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-orange-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                  <div class="counter-number-group"><span class="counter-icon orange-600 mr-5"><i class="wb-warning"></i></span><a href="{{ url('history?error_msg=2') }}"><span class="counter-number-related">Warning Resolved</span>   </a>       </div>
              </div>
            </div>
          </div>
        </div>       
    </div>    
    <div class="col-lg-2">        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $total['error']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon red-600 mr-5"><i class="wb-minus-circle"></i></span><a href="{{ url('history?error_msg=1') }}"><span class="counter-number-related">Attention Resolved</span> </a>         </div>
              </div>
            </div>
          </div>
        </div>        
    </div-->
    
    <!-- end boxes -->
    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <header class="panel-heading">
                <h3 class="panel-title">Machine Error Reports History</h3>       
            </header>
            
            <form role="form" method="GET" action="{{ url('history') }}">
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
                        <a href="{{ url('machine-error-reports') }}">
                        <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                            <span class="ladda-label">View Error Reports<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
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
                            <form role="form" method="GET" class="error-list-form" id="formFilterHistory">
                                <div class="col_empty ky-columns"></div>
                                <div class="col_date ky-columns">
                                    <div id="" class="input-group input-daterange">
                                        <input type="text" id="min-date" name="startdate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                                        <div class="input-group-addon">to</div>
                                        <input type="text" id="max-date" name="enddate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">  
                                    </div>        
                                </div>
                                <div class="col_model ky-columns">
                                    <select id="m_model_history" class="form-control" name="machine_model">
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
                                <div class="col_type ky-columns">
                                    <select id="m_type_history" class="form-control" name="machine_type">
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
                                <div class="col_serial ky-columns">
                                    <select id="e_serial_history" class="form-control" disabled="">
                                        <option selected="" disabled=""></option>
                                        <option disabled="">Name & Serial No</option>
                                    </select>
                                </div>
                                <div class="col_error ky-columns">
                                    <select id="e_msg_history" class="form-control" name="error_msg">
                                        <option selected="selected" disabled=""><b>Error Message</b></option>  
                                        <option value="" class="clearFilterOption">------Filter All------</option>
                                        <option value="3" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '3')? 'selected' : ''; endif; ?> >Notice</option>
                                        <option value="2" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '2')? 'selected' : ''; endif; ?> >Warning</option>
                                        <option value="1" <?php if(!empty($_GET)): echo ($filterData['error_msg'] == '1')? 'selected' : ''; endif; ?> >Needs Immediate Attention</option>
                                    </select>
                                </div>
                                <div class="col_site ky-columns">
                                    <select id="site_history" class="form-control" name="machine_site">
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
                            <table class="table table-hover" id="machineErrorReport">                                    
                                <thead>
                                    <tr role="row">                                                
                                        <th id="" class="col_empty"></th>
                                        <th style="width:11.2%;" class="col_date">Date Time</th>
                                        <th style="width:9.2%;" class="col_model">Machine Model</th>                                                
                                        <th style="width:9.2%;" class="col_type">Machine Type</th>
                                        <th style="width:16.3%;" class="col_serial">Name & Serial No</th>
                                        <th id="" class="col_error">Error Message</th>
                                        <th id="" class="col_site">Site</th>
                                        <th id="" class="">Resolved By</th>
                                       </tr> 
                                </thead> 
                                <?php //print_r($machinelogs); ?>
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
                                            </strong>
                                        </td>
                                        <td class="hidden-sm-down">
                                            @if ($machinelog->errortype == '1') {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @else
                                             {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @endif 
                                        </td>
                                        <td class="hidden-sm-down">
                                           {{ $machinelog->firstname }} {{ $machinelog->lastname }}
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
                    <div class="col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="custom_paging">
                            {{ $machinelogs->links() }}
                        </div>                            
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
        <form action="{{ URL::to('MachineErrorReportController/update_error_status') }}" method="post" id="status-update" >   
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
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Route</th></tr></thead>
            <tbody>
              @foreach ($offlineList as $lists)                      
                <tr>                            
                    <td><i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td>{{ $lists->state }}</td>
                    <td>{{ $lists->machine_model }}</td>
                    <td><a href="machine-management/show/{{ $lists->id }}">{{ $lists->machine_serial_no }}</a></td>
                    <td>{{ $lists->route }}</td>                                 
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
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Route</th></tr></thead>
            <tbody>
              @foreach ($onlineLists as $lists)                      
                <tr>                            
                    <td><i class="icon wb-check-circle ml-10 green-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td>{{ $lists->state }}</td>
                    <td>{{ $lists->machine_model }}</td>
                    <td><a href="machine-management/show/{{ $lists->id }}">{{ $lists->machine_serial_no }}</a></td>
                    <td>{{ $lists->route }}</td>                                 
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
            <thead><tr><th></th><th>State</th><th>Model</th><th>Serial</th><th>Route</th></tr></thead>
            <tbody>
              @foreach ($totalLists as $lists)                      
                <tr>                            
                    <td>
                        <?php if($lists->status =='1'){ ?>
                        <i class="icon wb-check-circle ml-10 green-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php }else{ ?>
                        <i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php } ?>
                    </td> 
                    <td>{{ $lists->state }}</td>
                    <td>{{ $lists->machine_model }}</td>
                    <td><a href="machine-management/show/{{ $lists->id }}">{{ $lists->machine_serial_no }}</a></td>
                    <td>{{ $lists->route }}</td>                                 
                </tr>                          
              @endforeach   
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->



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

