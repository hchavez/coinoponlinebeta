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
                        
                        <div class="col-md-6">
                            <form role="form" method="GET" class="error-list-form" id="formSearch">
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
                        <button type="button"  id="export" class="btn btn-default ladda-button" data-style="slide-right" data-plugin="ladda">
                            <span class="ladda-label">Export</span>                            
                        </button>                        
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
                               
                            <table class="table table-hover" id="machineErrorReport" style="border-top: 1px solid #e4eaec;">                                    
                                <thead>
                                    <tr role="row">                                                
                                        <th style="width:1%;" class="col_empty"></th>
                                        <th style="width:6.5%;" class="col_date">Date Time</th>                                        
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
                                        @if ($machineloggroup->error == $machinelog->error && $machineloggroup->machine_id == $machinelog->machine_id)
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
<script>
$(document).ready(function(){
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form'); form.attr('action', '?error'); form.submit();
    });
});
</script>
@endsection

