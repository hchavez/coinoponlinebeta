

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
                            <form role="form" method="GET" action="#">
                                <div class="input-group input-daterange">
                                <input type="hidden" name="logtype" value="errorlogs">
                                <input type="hidden" name="id" value="{{ $machine->id }}">
                                <input type="text" id="min-date" name="startdate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="max-date" name="enddate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">  
                                <button type="submit" class="btn btn-primary">Search</button> 
                                </div>
                            </form>
                        </div>
                       
                        <br><br>
                        <div class="col-sm-12">
                            <table id="goalsapi" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        
                                        <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">testPlay</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkPWM</th>
                                        <th width="25%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Date Time Log</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkVolt</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retPWM</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retVolt</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">voltDecRetPercentage</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">plusPickUp</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropCount</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropPWM</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropVolt</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">incVoltage</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">decVoltage</th>
                                        <th width="2%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
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