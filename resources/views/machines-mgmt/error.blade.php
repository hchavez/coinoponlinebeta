@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">
                
                <div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
                  <div class="panel">
                    <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab">
                        
                      <a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultOne">
                          <strong> {{ $machine->machine_description }} - Version - {{ $machine->version }}  </strong> 
                    </a>
                    </div>
                      
                    <div class="panel-collapse collapse" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel" style="">
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Type: {{ $machine->machine_type }} </label>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Category: {{ $machine->category }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Model: {{ $machine->machine_model }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Serial No: {{ $machine->serial_no }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Site: {{ $machine->site }}</label>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> Description: {{ $machine->machine_description }}</label>
                                </div>
                            </div>
                            
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Theme: {{ $machine->theme }}</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> Teamviewer: {{ $machine->teamviewer }}</label>
                                </div>
                            </div>
                        
                        </div> 
                      </div>
                    </div>
                  </div>
               
                </div>

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            
                    <div class="row">
                        <?php //echo $getID; ?>
                        <div class="col-md-6">                            
                            <form role="form" method="GET" action="{{ url('machine-management/error') }}/{{ $getID }}" class="error-list-form" id="formSearch" autocomplete="off">
                                <div class="ky-columns" style="width:40%;" >     
                                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Filter by Date">     
                                </div>                            
                            </form>
                           <!--div class="input-group input-daterange">

                            <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                            <div class="input-group-addon">to</div>
                            <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">
                           
                          </div-->
                        </div>                        
                        <br><br>
                        
                        <div class="col-sm-12">
                            
                            <!-- second Row -->
                        <div class="col-12" id="ecommerceChartView">
                            <div class="card card-shadow">

                                <form role="form" method="GET" action="{{ route('machine-management.index') }}">
                                    <div class="row">           
                                        <div class="col-md-6">                        
                                            <div id="filter_display">   
                                                <div class="bootstrap-tagsinput">
                                                        <?php if($filterData['startdate'] !=''): ?>
                                                            <!--<span class="tag badge badge-default">{{ $filterData['startdate'] }} - {{ $filterData['enddate'] }}</span>-->                                        
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
                    <!--                        <button type="button"  id="export" class="btn btn-default ladda-button" data-style="slide-right" data-plugin="ladda">
                                                <span class="ladda-label">Export</span>                            
                                            </button>-->                                            
                                            <a href="{{ url('machine-management/error') }}/{{ $getID }}">
                                                <button type="button" id="clearFilter" class="btn btn-danger"  value="0" style="vertical-align: bottom;">Clear Filter</button>
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

                                                <table id="klogs" class="display table table-hover dataTable table-bordered w-full dtr-inline table-responsive" role="grid" aria-describedby="example2_info">                                    
                                                    <thead>
                                                        <tr role="row">                                                
                                                            <th>Date Time</th>
                                                            <th>Error Type</th>                                        
                                                            <th>Error Message</th>                                        
                                                            <th>Resolve By</th>
                                                            <th>Resolve Date</th>
                                                        </tr> 
                                                    </thead>                                                     
                                                    <tbody class="table-section" data-plugin="tableSection" >                                                        
                                                    </tbody>                                                    
                                                    <tfoot></tfoot>
                                                </table>
                                              </div>
                                            </div>              
                                            <!-- End Example Table-section -->
                                        </div>                                        
                                    </div>
                                    <!-- End Team Total Completed -->
                                    <!-- End First Row -->

                                </div>
                            </div>
                        </div>
                        <!-- End Second Row -->
                            <!--table id="klogs" style="width:100%" class="display table table-bordered table-hover dataTable" >                            
                                <thead>
                                    <tr role="row">                                      
                                        <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Type</th>
                                        <th width="25%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Error Log</th>                                        
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Instances</th>
                                    </tr>
                                </thead>
                            </table-->                            
                                   
                        </div></div>

                        
                </div>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset("/js/export-table.js") }}"></script>
<style>
.dt-button.buttons-excel{margin: 1em 2em 0 0;}
.dt-buttons{position:static !important;}
.ladda-button, .dt-buttons{display:inline-block;vertical-align: top;}
.ladda-button{margin-top:10px;}
</style>
<script>    
    
$(document).ready(function() {

    //Machine error report filter
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });    
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form');  form.submit();
    });

       
});

</script>
@endsection

