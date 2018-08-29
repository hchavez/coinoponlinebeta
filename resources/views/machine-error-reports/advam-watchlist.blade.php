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
            
        
                <div class="row">           
                    <div class="col-md-6">                        
                        <div id="filter_display">   
                            <div class="bootstrap-tagsinput">
                                    <?php echo (!empty($data['dateRange']))? '<code>Filtered Date: '.$data['dateRange'].'</code>' : ''; ?>    
                            </div>                            
                        </div>
                    </div>                   
                    <div class="col-md-3"></div>
                    <div class="col-md-3"> 
                        
                 
                    </div>
                </div>
          
            <div class="row">   
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
                            <form role="form" method="GET" class="error-list-form" id="formFilter">
                                <div style="width:1.5%;" class="col_empty ky-columns"></div>
                                <div class="col_date ky-columns ky_date"> 
                                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Date Filter">     
                                </div>
                                <div class="col_model ky-columns ky_model">
                               
                                </div>
                                <div class="col_type ky-columns ky_type">
                                
                                </div>
                                <div class="col_serial ky-columns ky_serial">
                                  
                                </div>
                                <div class="col_error ky-columns ky_error">
                              
                                </div>
                             <div class="col_error ky-columns ">
                              
                                </div>
                                
                                <div class="col_ins ky-columns">  
         
                            
                                <button type="button" id="btnExport" onclick="fnExcelReport();" class="btn btn-default ladda-button" data-style="slide-right" data-plugin="ladda">
                                <span class="ladda-label">Export</span>                            
                            </button>
                        
                                </div>
                                
                                
                           </form>
                               <iframe id="txtArea1" style="display:none"></iframe>
                            <table class="table table-hover" id="machineErrorReportWatchlist">                                    
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
                                   
                                            <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?>
                                           
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
                                            $datemachineloggroup = date('Y-m-d', strtotime($machineloggroup->created_at));
                                            $datemachinelog = date('Y-m-d', strtotime($machinelog->created_at));
                                            $datereg = date('d/m/Y h:i A', strtotime($machinelog->date_created));
                                            foreach ($machinelogsgroup as $machineloggroup):
                                                   if ($machineloggroup->error == $machinelog->error && $machineloggroup->machine_id == $machinelog->machine_id ){ ?>
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
                                     <?php
                                     $datereg = date('d/m/Y h:i A', strtotime($machinelog->date_created));
                                     $datemachineloggroup = date('Y-m-d', strtotime($machineloggroup->created_at));
                                      $datemachinelog = date('Y-m-d', strtotime($machinelog->created_at));
                                 
                                     ?>
                                     
                                         @if ($machineloggroup->error == $machinelog->error && $machineloggroup->machine_id == $machinelog->machine_id )
                                          <tr>
                                              <td> &nbsp;</td>
                                              <td class="text-left">{{ date('d/m/Y h:i:s A', strtotime($machineloggroup->created_at))}}</td> 
                                              <td> &nbsp;</td> <td> &nbsp;</td> <td> &nbsp;</td>
                                              <td>
                                                  <?php $errorstring = str_replace(",","",$machineloggroup -> error); echo $errorstring;?>
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
        var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist'); form.submit();
    });
    $('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist'); form.submit();
    });
    
    $("#m_model").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist/'); form.submit(); });   
    $("#m_type").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist/'); form.submit(); });   
    $("#e_msg").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist/'); form.submit(); });
    $("#site").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist/'); form.submit(); });    
    $("#max-date").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'advam-watchlist/'); form.submit(); });
    
    $("#m_model").select2();
    $("#m_type").select2();
    $("#e_msg").select2();
    $("#site").select2();
    
    

    
});


    $("#export").click(function(){
       
	  $("#machineErrorReportWatchlist").table2excel({
	    // exclude CSS class
	    //exclude: ".noExl",
	    name: "Worksheet Name",
	    filename: "Advam-Watchlist" //do not include extension
	  });
    });
        

function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('machineErrorReportWatchlist'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"advam-watchlist.xlsx");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

</script>

@endsection

