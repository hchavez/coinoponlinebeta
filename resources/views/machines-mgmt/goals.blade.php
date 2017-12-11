

@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Type: {{ $machine->machine_type }} </label>
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
                                    <label class="col-sm-12 control-label"> IP Address: {{ $machine->ip_address }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                        
                        </div> 

                    <div class="row"><div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                                        <th width="25%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Date Time Log</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">testPlay</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">voltDecRetPercentage</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">plusPickUp</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropCount</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">incVoltage</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">decVoltage</th>
                                        <th width="2%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($goalslogs as $goalslog)
                                    <tr role="row" class="odd">
                                        <td >{{ $goalslog->id }} </td>
                                        <td >{{date('F d, Y H:i:s', strtotime($goalslog->created_at))}}</td>
                                        <td >{{ $goalslog->testPlay }}</td>
                                        <td >{{ $goalslog->pkPWM }}</td>
                                        <td >{{ $goalslog->pkVolt }}</td>
                                        <td >{{ $goalslog->retPWM }}</td>
                                        <td >{{ $goalslog->retVolt }}</td>
                                        <td >{{ $goalslog->voltDecRetPercentage }}</td>
                                        <td >{{ $goalslog->plusPickUp }}</td>
                                        <td >{{ $goalslog->dropCount }}</td>
                                        <td >{{ $goalslog->dropPWM }}</td>
                                        <td >{{ $goalslog->dropVolt }}</td>
                                        <td >{{ $goalslog->incVoltage }}</td>
                                        <td >{{ $goalslog->decVoltage }}</td>
                                        <td>{{ $goalslog->status }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr role="row">
                                        <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Date Time Log</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">testPlay</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">pkVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">retVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">voltDecRetPercentage</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">plusPickUp</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropCount</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropPWM</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">dropVolt</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">incVoltage</th>
                                        <th width="5%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">decVoltage</th>
                                        <th width="2%"    tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    </tr>

                                </tfoot>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ $goalslogs->links() }}</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                               
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection