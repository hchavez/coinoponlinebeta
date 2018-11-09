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
                    <span class="counter-number-related"><?php if($permit['read']): ?><a href="" data-target=".example-modal-lg" data-toggle="modal"><?php endif; ?>Machine Offline <?php if($permit['read']): ?></a><?php endif; ?></span>          </div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['notice']; ?></b></h1></div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['warning']; ?></b></h1></div>
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
            <div class="counter-number-group mb-10 text-center"><h1 class="counter-number"><b><?php echo $data['error']; ?></b></h1></div>
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
                          <a href="{{ url('history') }}"><button type="button" class="btn btn-default" style="float:left;" >History</button></a>
                           <div class="example">   
                            <!--form role="form" method="GET" class="error-list-form" id="formFilter">                                
                                <div class="col_date ky-columns ky_date">
                                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Search date range" autocomplete="off">     
                                </div>
                           </form-->
                               
                            <table class="table table-hover" id="machineErrorReport">                                    
                                <thead>
                                    <tr role="row">        
                                        <th>Date Time</th>
                                        <th>Machine Model</th>                                                
                                        <th>Machine Type</th>
                                        <th>Name & Serial No</th>                                       
                                        <th>Error Type</th>
                                        <th>Error Message</th>
                                        <th>Site</th>
                                        <th>View Errors</th>
                                       </tr> 
                                </thead> 
                                <?php //print_r($data['logs']);
                                //echo count($data['logs']['errors']);
                                //echo '-'.count($data['logs']['machines']);
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
                                      ?>                                      
                                      <tr>
                                        <td><?php echo date("d/m/Y"); ?></td>
                                        <td><?php echo $machines->machine_model; ?></td>
                                        <td><?php echo $machines->machine_type; ?></td>
                                        <td><?php echo $machines->name_serial; ?></td>
                                        <td style="color:<?php echo $color; ?>"><?php echo $errortype; ?></td>
                                        <td><?php echo $error->error; ?></td>                                        
                                        <td><?php echo $machines->site; ?></td>
                                        <td><a href="#" data-toggle="modal" class="viewerrorclass" data-target="#viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" id="#viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>">View Errors</a></td>
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

<?php //print_r($data); ?>
<!-- MODAL MUST END HERE -->
</div>
<style type="text/css">
.machines-modal{max-width:1500px;max-height: 450px;}
.table-container {
    height: 10em;
}
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
<script type="text/javascript">
$(document).ready(function() {

    var origin   = window.location.origin;      
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/';
    }else{
        var url = 'https://www.ascentri.com/';
    }

    $('#machineErrorReport').DataTable({
      scrollY:        400,
      bScrollInfinite: true,
      bScrollCollapse: true,
      order: [[ 4, "asc" ]],
      paging: false
    });

    $("a.viewerrorclass").click(function(evt){
        var values = $(this).attr("id");
        var idsplit = values.split("_");
        var id = idsplit[1];
        var type = idsplit[2];
        console.log(id);
        $.ajax({
          url: url+'get_errorlist',
          type: "GET",
          data: {id: id, type: type },
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
            html += 'Total: '+total;
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
   
} );
</script>

@endsection

