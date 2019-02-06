@extends('layouts.app-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">
                
          

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
             <header class="panel-heading">
                                    <h3 class="panel-title">Machine Advam with No-Taps Report</h3> 
                                </header>
                    <div class="row">
                         
                                
                       
                        <div class="col-md-6">                            
                            <form role="form" method="GET" action="{{ url('advam-notap') }}" class="error-list-form" id="formSearch" autocomplete="off">
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
                     
                        <div class="col-sm-12">
                            
                            <!-- second Row -->
                        <div class="col-12" id="ecommerceChartView">
                            <div class="card card-shadow">
                              

                             
                                <div class="row" ng-app="machineApp" ng-controller="machineController">   
                                    <!-- Team Total Completed -->
                                    <div class="col-xxl-12">
                                        <div id="teamCompletedWidget" class="card card-shadow example-responsive">                       

                                            <!-- Example Table section -->
                                            <div class="example-wrap">
                                              <!-- <h4 class="example-title">Machine LIVE Error Status</h4> -->
                                            
                                               <div class="alert dark alert-dismissible" role="alert">Filter By: <?php echo $_GET['dateRange']; ?></div>
                                              
                                      
                                               <div class="example">                               

                                                <table id="advamnotapslogs" class="display table table-hover dataTable table-bordered w-full dtr-inline table-responsive" role="grid" aria-describedby="example2_info"">                                    
                                                    <thead>
                                                        <tr role="row">                                                
                                                            <th>Date</th>
                                                            <th>Machine</th>
                                                            <th>Serial</th>
                                                            <th>Site</th>
                                                            <th>Machine Malfunction</th>
                                                            <th>Machine Offline</th>
                                                            <th>Internet Lost</th>
                                                            <th>Start of Internet Lost</th>
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

