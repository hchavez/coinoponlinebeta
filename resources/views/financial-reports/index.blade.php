@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Financial Reports</h3>
    </header>
    <?php //print_r($machinelogs); ?>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> 
            <div class="row">
                
                <div class="col-lg-4"></div>
                <div class="col-lg-3"></div>                
                <div class="col-lg-3 text-right">Date: <code>{{ date('F j, Y', strtotime($from))}} - {{ date('F j, Y', strtotime($to))}}</code></div>
                <div class="col-lg-2">   
                    <form role="form" method="GET" class="error-list-form" id="formFilter">                                         
                        <input type="text" name="dateFilter" id="dateFilter" class="form-control pull-right" placeholder="Filter By Date"> 
                                                
                        <input type="hidden" name="coin28" id="coin28" value="{{ $coin28 }}">
                        <input type="hidden" name="coin28B" id="coin28B" value="{{ $coin28B }}">
                        <input type="hidden" name="coin28S" id="coin28S" value="{{ $coin28S }}">
                        
                        <input type="hidden" name="coin28" id="coin29" value="{{ $coin29 }}">
                        <input type="hidden" name="coin29B" id="coin29B" value="{{ $coin29B }}">
                        <input type="hidden" name="coin29S" id="coin29S" value="{{ $coin29S }}">
                        
                        <input type="hidden" name="coin30" id="coin30" value="{{ $coin30 }}">
                        <input type="hidden" name="coin30B" id="coin30B" value="{{ $coin30B }}">
                        <input type="hidden" name="coin30S" id="coin30S" value="{{ $coin30S }}">
                        
                        <input type="hidden" name="coin31" id="coin31" value="{{ $coin31 }}">   
                        <input type="hidden" name="coin31B" id="coin31B" value="{{ $coin31B }}">
                        <input type="hidden" name="coin31S" id="coin31S" value="{{ $coin31S }}">
                        
                        <input type="hidden" name="coin35" id="coin35" value="{{ $coin35 }}">
                        <input type="hidden" name="coin35B" id="coin35B" value="{{ $coin35B }}">
                        <input type="hidden" name="coin35S" id="coin35S" value="{{ $coin35S }}">
                        
                        <input type="hidden" name="coin36" id="coin36" value="{{ $coin36 }}">
                        <input type="hidden" name="coin36B" id="coin36B" value="{{ $coin36B }}">
                        <input type="hidden" name="coin36S" id="coin36S" value="{{ $coin36S }}">
                        
                        <input type="hidden" name="coin37" id="coin37" value="{{ $coin37 }}">
                        <input type="hidden" name="coin37B" id="coin37B" value="{{ $coin37B }}">
                        <input type="hidden" name="coin37S" id="coin37S" value="{{ $coin37S }}">
                        
                        <input type="hidden" name="coin38" id="coin38" value="{{ $coin38 }}">
                        <input type="hidden" name="coin38B" id="coin38B" value="{{ $coin38B }}">
                        <input type="hidden" name="coin38S" id="coin38S" value="{{ $coin38S }}">
                        
                        <input type="hidden" name="coin39" id="coin39" value="{{ $coin39 }}">
                        <input type="hidden" name="coin39B" id="coin39B" value="{{ $coin39B }}">
                        <input type="hidden" name="coin39S" id="coin39S" value="{{ $coin39S }}">
                        
                        <input type="hidden" name="coin40" id="coin40" value="{{ $coin40 }}">
                        <input type="hidden" name="coin40B" id="coin40B" value="{{ $coin40B }}">
                        <input type="hidden" name="coin40S" id="coin40S" value="{{ $coin40S }}">
                        
                        <input type="hidden" name="coin41" id="coin41" value="{{ $coin41 }}">
                        <input type="hidden" name="coin41B" id="coin41B" value="{{ $coin41B }}">
                        <input type="hidden" name="coin41S" id="coin41S" value="{{ $coin41S }}">
                        
                        <input type="hidden" name="coin42" id="coin42" value="{{ $coin42 }}">
                        <input type="hidden" name="coin42B" id="coin42B" value="{{ $coin42B }}">
                        <input type="hidden" name="coin42S" id="coin42S" value="{{ $coin42S }}">
                        
                        <input type="hidden" name="coin43" id="coin43" value="{{ $coin43 }}">
                        <input type="hidden" name="coin43B" id="coin43B" value="{{ $coin43B }}">
                        <input type="hidden" name="coin43S" id="coin43S" value="{{ $coin43S }}">
                        
                        <!--input type="hidden" name="coin28" id="coin41" value="{{ $coin41 }}"-->
                    </form>                                       
                </div>
                
                <div class="col-xl-12">
                <!-- Example Tabs -->
                <div class="example-wrap">
                  <div class="nav-tabs-horizontal" data-plugin="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne"
                          aria-controls="exampleTabsOne" role="tab">George System and Card Reader</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsTwo"
                          aria-controls="exampleTabsTwo" role="tab">George System</a></li>    
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsThree"
                          aria-controls="exampleTabsThree" role="tab">Card Reader</a></li>    
                    </ul>
                    <div class="tab-content pt-20">
                      <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">
                        <!-- Example C3 Stacked Bar -->
                        <div class="example-wrap m-md-0">
                          <h4 class="example-title"></h4>
                          <p> </p>
                          <div class="example">
                            <div id="bothShow"></div>
                          </div>
                        </div>
                        <!-- End Example C3 Stacked Bar -->
                      </div>
                      <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
                        <!-- Example C3 Stacked Bar -->
                        <div class="example-wrap m-md-0">
                          <h4 class="example-title"></h4>
                          <p> </p>
                          <div class="example">
                            <div id="coinbillin"></div>
                          </div>
                        </div>
                        <!-- End Example C3 Stacked Bar -->
                      </div>   
                       <div class="tab-pane" id="exampleTabsThree" role="tabpanel">
                            <!-- Example C3 Stacked Bar -->
                            <div class="example-wrap m-md-0">
                              <h4 class="example-title"></h4>
                              <p> </p>
                              <div class="example">
                                <div id="exampleC3StackedBar"></div>
                              </div>
                            </div>
                            <!-- End Example C3 Stacked Bar -->
                      </div>  
                    </div>
                  </div>
                </div>
                <!-- End Example Tabs -->
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{asset('js/financial-script.js')}}"></script>
<script>    
$(document).ready(function() {  
    $('input[name="dateFilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateFilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form'); form.attr('action', 'financial-reports'); form.submit();
    });
    $('input[name="dateFilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        var select = $(this), form = select.closest('form'); form.attr('action', 'financial-reports'); form.submit();
    });
});
</script>

@endsection