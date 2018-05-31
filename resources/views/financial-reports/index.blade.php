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
                <div class="col-lg-4"></div>                
                <div class="col-lg-2">
                    <select id="e_category" name="e_category" class="form-control">
                        <option selected="" disabled="">Category</option>
                        <option value="cardreader">Card Reader</option>
                        <option value="george system">George System</option>
                        <option value="george system and cardreader">Both</option>
                    </select>
                </div>
                <div class="col-lg-2">   
                    <form role="form" method="GET" class="error-list-form" id="formFilter">                                         
                        <input type="text" name="dateFilter" id="dateFilter" class="form-control pull-right" placeholder="Filter By Date"> 
                        <input type="hidden" name="coin" id="swipe38" value="{{ $swipe38 }}">
                        <input type="hidden" name="coin" id="swipe39" value="{{ $swipe39 }}">
                        <input type="hidden" name="coin" id="swipe40" value="{{ $swipe40 }}">
                        <input type="hidden" name="coin" id="swipe42" value="{{ $swipe42 }}">
                        <input type="hidden" name="coin" id="swipe43" value="{{ $swipe43 }}">
                    </form>                                       
                </div>
                
                <div class="col-lg-12">
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