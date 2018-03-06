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
                            <table id="dashboard_sort" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <!--table class="display table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" cellspacing="0" width="100%"-->
                                <thead>
                                    <tr role="row">
                                       <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Type</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Error Log</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($errorlogs as $errorlog)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $errorlog->id }} </td>
                                        <td class="hidden-xs">{{ $errorlog->type }}</td>
                                        <td class="hidden-xs">{{ $errorlog->error }}</td>
                                        <td class="hidden-xs">{{date('d/m/Y h:i A', strtotime($errorlog->created_at))}}</td>
                                        <td class="hidden-xs">{{ $errorlog->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>                                    
                                    <tr role="row">
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Type</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Error Log</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>                                    
                                </tfoot>
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

