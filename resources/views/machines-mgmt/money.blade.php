@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <!--div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                        </div>
                    </div-->
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

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="GET" class="error-list-form" id="formSearch">
                            <div class="ky-columns" style="width:40%;" >
                                <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Filter by Date" autocomplete="off">  
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
                            <a href="{{ url('machine-management/money') }}/{{ $id }}">
                                <button type="button" id="clearFilter" class="btn btn-danger"  value="0" style="vertical-align: bottom;">Clear Filter</button>
                            </a>
                            <table id="moneyapi" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    
                                    <tr role="row">
                                        <th style="width:15% !important;" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >DateLog</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >swipeIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >type</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >paymentResult</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >declineReason</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >cardType</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >tCardData</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >procesTime</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >reference</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>
                                      
                                    </tr>
                                </thead>
                               
                            </table>
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
        var select = $(this), form = select.closest('form'); form.attr('action', '?money'); form.submit();
    });
});
</script>
@endsection
