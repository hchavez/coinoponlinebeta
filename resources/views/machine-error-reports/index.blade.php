@extends('layouts.app-template')
@section('content')
<!-- Page -->
<meta http-equiv="refresh" content="300" >

<div class="row" id="boxesCount"> 
  <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['online']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-green-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon green-600 mr-5"><i class="wb-graph-up"></i></span>
                    <span class="counter-number-related"><?php if($permit['read']): ?>
                    <a href="" data-target=".online-modal-lg" data-toggle="modal"><?php endif; ?>Machine Online<?php if($permit['read']): ?></a><?php endif; ?></span>          
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['offline']; ?></b></h1></div>
            <div class="counter-label">
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 100%" role="progressbar"></div>
              </div>
              <div class="counter counter-sm text-left">
                <div class="counter-number-group"><span class="counter-icon red-600 mr-5"><i class="wb-graph-down"></i></span>
                    <span class="counter-number-related"><?php if($permit['read']): ?><a href="" data-target=".example-modal-lg-off" data-toggle="modal"><?php endif; ?>Machine Offline <?php if($permit['read']): ?></a><?php endif; ?></span>          </div>
              </div>
            </div>
          </div>
        </div><!-- End Card -->        
    </div>
    <div class="col-lg-2"><!-- Card -->        
        <div class="card card-block p-30">
          <div class="counter counter-md text-left">            
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['total']; ?></b></h1></div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b id="total_notice"></b></h1></div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b id="total_warning"></b></h1></div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b id="total_error"></b></h1></div>
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

    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <header class="panel-heading">
                <h3 class="panel-title">Machine Error Reports</h3> 
            </header>
            
            <?php //print_r($data['errorlogs']); ?>
            <div class="row" ng-app="machineApp" ng-controller="machineController" style="margin:0;">   
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
                            <!--form  method="GET" class="error-list-form" id="formFilter">                                
                                <div class="col_date ky-columns ky_date" style="width:15%;">
                                    <input type="text" name="dateRange" id="dateRanger" class="form-control pull-left" placeholder="Search date range" >     
                                </div>
                            </form-->
                            <br>
                            <a href="{{ url('history') }}"><button type="button" class="btn btn-default" style="float:left;" >History</button></a>
                               
                            <table class="table table-hover table_label" id="machineErrorReport">                                    
                                <thead>
                                    <tr role="row">        
                                        <th>Date Time</th>
                                        <th>Machine Model</th>                                                
                                        <th>Machine Type</th>
                                        <th>Name & Serial No</th>                                       
                                        <th>Error Type</th>
                                        <th>Error Message</th>
                                        <th>Site</th>
                                        <th>Count</th>
                                        <th>View</th>
                                       </tr> 
                                </thead> 
                                <?php 
                                //$homepage = file_get_contents('http://localhost/coinoponlinebeta/public/get_errorlist?id=101&type=1&errmsg=card-LostInternet');
                                //print_r($homepage);
                                //print_r($data);
                                ?>
                                 <tbody class="table-section" data-plugin="tableSection" >
                                  @foreach ($data['logs']['errors'] as $error)
                                    @foreach ($data['logs']['machines'] as $machines)
                                    <?php  if($error->machine_id == $machines->machine_id): ?>
                                      <?php
                                      if($error->type == '1'): $errortype = 'Needs immediate Attention'; $color = '#f96868';
                                      elseif($error->type == '2'): $errortype = 'Warning'; $color = '#f2a654';
                                      else: $errortype = 'Notice'; $color = '#57c7d4';
                                      endif;

                                      if( strpos( $error->error, '_') !== false): $errormsg = str_replace('_','-', $error->error);
                                      else: $errormsg = str_replace(' ','-', $error->error);
                                      endif;
                                      $idname = $machines->machine_id.'_'.$error->type.'_'.$errormsg;                                     
                                      ?>                                      
                                      <tr>
                                        <td><?php echo (!empty($_GET))? $data['fdate'] : date("d/m/Y"); ?></td>
                                        <td><?php echo $machines->machine_model; ?></td>
                                        <td><?php echo $machines->machine_type; ?></td>
                                        <td><?php echo $machines->name_serial; ?></td>
                                        <td style="color:<?php echo $color; ?>"><?php echo $errortype; ?></td>
                                        <td><?php echo $error->error; ?></td>                                        
                                        <td><?php echo $machines->site; ?></td>
                                        <td class="clickedVal" id="<?php echo $idname; ?>"></td>
                                        <td><a href="#" data-toggle="modal" class="viewerrorclass" data-target="#viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" id="#viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" data-error-type="<?php echo $errormsg; ?>">View Errors</a></td>
                                      </tr>
                                    <?php endif; ?>
                                    @endforeach
                                  @endforeach
                                </tbody>                             
                                
                                <tfoot></tfoot>
                            </table>
                          </div>
                        </div>              
                        <!-- End Example Table-section -->
                    </div>
                    <?php //print_r($machinelogss); ?>
                    
                </div>
                <!-- End Team Total Completed -->
                <!-- End First Row -->

            </div>
        </div>
    </div>
    <!-- End Second Row -->
@foreach ($data['logs']['errors'] as $error)
  @foreach ($data['logs']['machines'] as $machines)
  <?php  if($error->machine_id == $machines->machine_id): ?>
<!-- MODAL START HERE-->
<div class="modal fade example-modal-lg" id="viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg machines-modal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Error Report</h4>
      </div>
      <div class="modal-body" id="tablelist">
       <div id="loader"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade example-modal-lg" id="myModal<?php echo $machines->machine_id.'_'.$error->type; ?>" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Resolve</h4>
      </div>
      <div class="modal-body" >
        
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
  @endforeach
@endforeach

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
              @foreach ($data['totalOnline'] as $lists)                      
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
<div class="modal fade example-modal-lg-off" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleOptionalLarge">Offline Machine</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead><tr><th>Serial</th><th>Site</th><th>Area</th><th>Error</th><th>Lastlog</th></tr></thead>
            <tbody>
              @foreach ($data['totalOffline'] as $lists)                      
                <tr>                            
                    <!--<td width="5%"><i class="icon wb-minus-circle ml-10 red-600" aria-hidden="true" data-toggle="tooltip" data-original-title="help" data-container="body" title=""></i></td> 
                    <td width="9%">{{ $lists->state }}</td>
                    <td width="25%">{{ $lists->machine_model }}</td> -->
                    <td width="23%"><a href="machine-management/show/{{ $lists->id }}">{{ $lists->comments }} - {{ $lists->machine_serial_no }}</a></td>
                    <td width="20%">{{ $lists->site }}</td>      
                    <td width="15%">{{ $lists->area }}</td>   
                    <td width="20%">Machine Offline</td>   
                    <td width="23=0%"> {{ date('d/m/Y h:i A', strtotime($lists->lastlog )) }} </td>   
                </tr>                          
              @endforeach   
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
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
              @foreach ($data['totalMachine'] as $lists)                      
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
<?php //print_r($data); ?>
<!-- MODAL MUST END HERE -->
</div>
<style type="text/css">
.select2-container{width:100% !important;}
.machines-modal{max-width:1500px;max-height: 450px;}
.ladda-button{margin-top:10px;}
.dt-buttons{top:1em !important;position: inherit !important;}
.table-container {height: 10em;}
table#errorlistlogs {
    display: flex;
    flex-flow: column;
    height: 480px;
    width: 100%;
}
table#errorlistlogs thead {
    flex: 0 0 auto;
    width: calc(100% - 0.9em);
}
table#errorlistlogs tbody {
    flex: 1 1 auto;
    display: block;
    overflow-y: scroll;
}
table#errorlistlogs tbody tr {
    width: 100%;
}
table#errorlistlogs thead,
table#errorlistlogs tbody tr {
    display: table;
    table-layout: fixed;
}
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
$(document).ready(function() {

    var origin   = window.location.origin;      
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/';
    }else{
        var url = 'https://www.ascentri.com/';
    }
     
    setTimeout(function(){
      $('.table_label select').each(function(i) {
          var label = ['Date Time', 'Machine Model', 'Machine Type', 'Name & Serial No', 'Error Type', 'Error Message', 'Site','Count','View'];
          $(this).attr('id', 'filter'+(i+1));        
          $("#filter" + (i+1)).select2({
              placeholder: label[i]
          });        
      }); 
    }, 3000);

    $('#machineErrorReport').DataTable({
      scrollY:        400,
      bScrollInfinite: true,
      bScrollCollapse: true,
      order: [[ 4, "asc" ]],
      paging: false,
      dom: 'Bfrtip',
      buttons: ['excel'],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });   

    $("a.viewerrorclass").click(function(evt){
        var values = $(this).attr("id");
        var idsplit = values.split("_");
        var id = idsplit[1];
        var type = idsplit[2];
        var errmsg = $(this).attr("data-error-type");
        console.log(errmsg);
        $.ajax({
          url: url+'get_errorlist',
          type: "GET",
          data: {id: id, type: type, errmsg: errmsg },
          dataType: 'json',
          beforeSend: function(){  
            $(values+' #loader').html('<img src="'+url+'/global/photos/pacman.gif" style="text-align:center;width:60px"> Preparing reports');
          },
          success: function(data){           
            console.log(data);  
            $('#loader').html();          
            var html = '';
            var total = data.length;
            var error_id = '';
            html += '<p><strong>Total: '+total+'</strong></p>';
            html += '<a href="#" data-toggle="modal" data-target="#myModal'+id+'_'+type+'" id="idmyModal'+id+'_'+type+'">';
            html += '<button type="button" class="btn btn-blue" style="float:right;">Update</button></a>';
            html += '<div class="checkbox-custom checkbox-primary" style="float:right;right: 3em;"><input type="checkbox" id="inputChecked" checked=""><label for="inputChecked">Resolve Error</label></div>'; 
            html += '<table class="table table-hover dataTable table-striped w-full table-container" id="errorlistlogs" data-plugin="dataTable">';
            html += '<thead><tr><th>Date</th><th>Machine Model</th><th>Machine Type</th><th>Name & Serial No</th><th>Error Message</th><th>Site</th></tr></thead><tbody>';
            $.each(data,function(key,value){
                  error_id += value.error_id+',';
                  html +='<tr>';
                  html +='<td>'+ value.date_created + '</td>';
                  html +='<td>'+ value.machine_model + '</td>';
                  html +='<td>'+ value.machine_type + '</td>';
                  html +='<td>'+ value.name_serial + '</td>';
                  html +='<td><a href="#">'+ value.error + '</a></td>';
                  html +='<td>'+ value.site_name + '</td>';
                  html +='</tr>';
              });
            html += '</tbody></table>';              
            $(values+' #tablelist').html(html);

            console.log(error_id.split(','));

            var et_res = '#idmyModal'+id+'_'+type;
            $(et_res).click(function(){
                $('#myModal'+id+'_'+type+' .modal-body').html('ID: '+id+'- TYPE:'+type);    
                                                  
            });

          }
        });

    });
   
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: true,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateRange"]').on("change",function(){
        var selected = $(this).val();       
        $( "#formFilter" ).submit();
    });
   
    var rows = document.getElementById('machineErrorReport').rows,
        len = rows.length, i, cellNum = 4,  errorcount = 0, noticecount = 0, warningcount = 0, cell;

    for (i = 0; i < len; i++) {
        cell = rows[i].cells[cellNum];
        if (cell.innerHTML === 'Needs immediate Attention') {
            errorcount++;
        }
        if (cell.innerHTML === 'Notice') {
            noticecount++;
        }
        if (cell.innerHTML === 'Warning') {
            warningcount++;
        }
        else if(i === (len - 1)) {
            cell.innerHTML = errorcount;
            cell.innerHTML = noticecount;
            cell.innerHTML = warningcount;
        }
    }   
    $('#total_error').html(errorcount);
    $('#total_notice').html(noticecount);
    $('#total_warning').html(warningcount);


    /*$('#machineErrorReport td.clickedVal').html('<img src="'+url+'/global/photos/load.gif">');
    setTimeout(function(){
      $('#machineErrorReport td.clickedVal').each(function() {
          var values = $(this).attr('id');  
          var idsplit = values.split("_");
          var id = idsplit[0];
          var type = idsplit[1];
          var errmsg = idsplit[2];
          //console.log(values); 
          $.ajax({
                url: url+'counter',
                type: "GET",
                data: {id: id, type: type, errmsg: errmsg },
                success: function(data){   
                var total = data.length;                  
                $('#machineErrorReport td#'+values).html(data);                                    
            },error: function(response){
                $('.modal-dialog').html('<div class="alert dark alert-danger alert-dismissible" role="alert">Error!</div>');
            }
        }); 
      });
    }, 10000);*/

    

});


</script>

@endsection

