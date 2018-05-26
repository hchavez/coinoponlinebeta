@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                        </div>
                    </div>
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
                                    <label class="col-sm-12 control-label"> IP Address: {{ $machine->ip_address }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                        
                        </div> 

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-daterange">
                                <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">
                              </div>
                        </div>                       
                        <br><br>
                        <div class="col-sm-12">
                            
                            <table id="moneyapi" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    
                                    <tr role="row">
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" >ID</th>
                                        <th width="20%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >swipeIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >type</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >paymentResult</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >declineReason</th>
                                         <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >procesTime</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                               
                            </table>
                        </div></div>
                                            
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
