@extends('layouts.app-template')
@section('content')
<!-- Page -->
<meta http-equiv="refresh" content="300" >

<div class="row" id="boxesCount"> 
    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <header class="panel-heading">
                <h3 class="panel-title">Machine Error Reports History</h3> 
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
                            <form  method="GET" class="error-list-form" id="formFilter">                                
                                <div class="col_date ky-columns ky_date" style="width:15%;">
                                    <input type="text" name="dateRange" id="dateRanger" class="form-control pull-left" placeholder="Search date range" >     
                                </div>
                            </form>
                            <br>
                            <a href="{{ url('machine-error-reports') }}"><button type="button" class="btn btn-default" style="float:left;" >Errorlogs</button></a>
                            <button type="button" id="clearFilter" class="btn btn-danger" value="0" style="vertical-align: bottom;float:right;">Clear Filter</button>
                               
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
                                        <th>Resolve By</th>
                                        <th>View Errors</th>
                                       </tr> 
                                </thead>                                
                                <?php //print_r($data['logs']['machines']); ?>
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
                                      
                                      $resolve_by = ($error->resolve_by == '0')? 'System' : '';
                                      ?>                                      
                                      <tr>
                                        <td><?php echo ($data['fdate']=='')? $machines->updated_at : $data['fdate']; ?><?php //echo $error->created_at; ?></td>
                                        <td><?php echo $machines->machine_model; ?></td>
                                        <td><?php echo $machines->machine_type; ?></td>
                                        <td><?php echo $machines->name_serial; ?></td>
                                        <td style="color:<?php echo $color; ?>"><?php echo $errortype; ?></td>
                                        <td><?php echo $error->error; ?></td>                                        
                                        <td><?php echo $machines->site; ?></td>
                                        <td><?php echo $resolve_by; ?></td>
                                        <td><a href="#" data-toggle="modal" class="viewerrorclass" data-target="#viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" id="viewerror_<?php echo $machines->machine_id.'_'.$error->type; ?>" data-error-type="<?php echo $errormsg; ?>">View Details</a></td>
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
          var label = ['Date Time', 'Machine Model', 'Machine Type', 'Name & Serial No', 'Error Type', 'Error Message', 'Site','Resolve By','View'];
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
      order: [[ 0, "desc" ]],
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

        var urlParams = new URLSearchParams(location.search);
        if(urlParams !=''){
          var filterDate = urlParams.get('dateRange');
        }else{
          var currentDate = new Date()
          var day = currentDate.getDate()
          var month = currentDate.getMonth() + 1
          var year = currentDate.getFullYear()
          //document.write("<b>" + Year + "-" + month + "-" + day + "</b>")
          var today = year + "-" + month + "-" + day;
          var from = year + "-" + month + "-" + day - 10;
          var filterDate = from+'-'+today;
        }
          var filterSplit = filterDate.split(" - ");
          var filterFrom = filterSplit[0].split("/");
          var fromDate = filterFrom[2]+'-'+filterFrom[0]+'-'+filterFrom[1];
        
        console.log(errmsg);
        $.ajax({
          url: url+'get_errorlist_history',
          type: "GET",
          data: {id: id, type: type, errmsg: errmsg, fromDate: fromDate  },
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
            html += '<table class="table table-hover dataTable table-striped w-full table-container" id="errorlistlogs" data-plugin="dataTable">';
            html += '<thead><tr><th>Date</th><th>Machine Model</th><th>Machine Type</th><th>Name & Serial No</th><th>Error Message</th><th>Site</th><th>Resolve By</th><th>Resolve Date</th></tr></thead><tbody>';
            $.each(data,function(key,value){
                  error_id += value.error_id+',';
                  var resolve_by;
                  if(value.resolve_by == '0'){ resolve_by='System'; }else{ resolve_by=''; }
                  
                  html +='<tr>';
                  html +='<td>'+ value.date_created + '</td>';
                  html +='<td>'+ value.machine_model + '</td>';
                  html +='<td>'+ value.machine_type + '</td>';
                  html +='<td>'+ value.name_serial + '</td>';
                  html +='<td>'+ value.error + '</td>';
                  html +='<td>'+ value.site_name + '</td>';
                  html +='<td>'+ resolve_by + '</td>';
                  html +='<td>'+ value.resolve_date + '</td>';
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
   
   $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });

} );
</script>

@endsection

