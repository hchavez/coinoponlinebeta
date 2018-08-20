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
                <div class="counter-number-group"><span class="counter-icon red-600 mr-5"><i class="wb-minus-circle"></i></span><a href="{{ url('machine-error-reports?error_msg=1') }}"><span class="counter-number-related">Attention</span> </a>         </div>
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
                <h3 class="panel-title">Advam Machine Watchlist</h3>       
            </header>
            
        
   
          
            <div class="panel-body">
        
                        <?php if (Session::has('success')): ?>
                            <div class="alert  <?php echo Session::get('alert-class', ''); ?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo Session::get('success', ''); ?> 
                            </div>
                        <?php endif; ?>
        
            <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">     
                <form role="form" method="GET" class="error-list-form" id="formSearch">
                    <div class="ky-columns" style="width:15%;" >
                        <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Filter by Date">  
                    </div>    
                    <?php echo (!empty($data['dateRange']))? '<code>Filtered Date: '.$data['dateRange'].'</code>' : ''; ?>               
                </form>
                <br>
                <div class="row"><div class="col-sm-12 longFilter" style="padding:0;">     

                        <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>

                        <div id="filterDiv"></div>
                            <table class="display table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Date Time</th>                                
                                    <th>Machine Model</th>
                                    <th>Machine Type</th>
                                    <th>Name & Serial No</th>
                                    <th>Error Message</th>
                                    <th>Site</th>
                                </tr>                            
                                </thead>




                                <tbody>
                                <?php echo $machines; ?>
                                @foreach ($machines as $machi)                            
                                <tr <?php echo ($permit['readAll'])? 'class="clickable-row"' : ''; ?> role="row" data-href="{{ route('machine-management.show', ['id' => $machi->machine_id]) }}"  >

                                        <td> {{ $machi->date_created }} </td>   
                                        <td> {{ $machi->machine_model }}</td>
                                        <td> {{ $machi->machine_type }}</td>
                                        <td> {{ $machi->comments }} - {{ $machi->serial_no }} </td>  
                                        <td> {{ $machi->error }} </td>
                                        <td>{{ $machi->site_name }} </td>

                                    </tr>                            
                                @endforeach 
                                </tbody>

                            </table>
                    </div></div>


            </div>
    </div>
        </div>
    </div>
    <!-- End Second Row -->

</div>


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
              @foreach ($offlineList as $list)                      
                <tr>                            
                    <td width="5%"><i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td width="9%">{{ $list->state }}</td>
                    <td width="25%">{{ $list->machine_model }}</td>
                    <td width="20%"><a href="machine-management/show/{{ $list->id }}">{{ $list->comments }} - {{ $list->machine_serial_no }}</a></td>
                    <td  style="width:30% !important;">{{ $list->site }}</td>      
                    <td>{{ $list->area }}</td>   
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
                        <?php //if($lists->status =='1'){ ?>
                        <i class="icon wb-check-circle ml-10 green-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php //}else{ ?>
                        <i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i>
                        <?php// } ?>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>    
$(document).ready(function() {   
    /*Resolve*/
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
    });
    $('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
    });
    
});
</script>


@endsection

