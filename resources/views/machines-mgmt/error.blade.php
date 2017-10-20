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
                                <label class="col-sm-12 control-label">Machine Name: {{ $machine->machine_model }} </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Machine Type: {{ $machine->machine_type }} </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Location: {{ $machine->machine_description }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Date Added: {{ $machine->created_at }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label"> Description: {{ $machine->machine_description }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Machine Model: {{ $machine->machine_model }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">City: {{ $machine->machine_description }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Status: {{ $machine->status }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
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
                                        <td class="hidden-xs">{{date('F d, Y H:i:s', strtotime($errorlog->created_at))}}</td>
                                        <td class="hidden-xs">{{ $errorlog->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr role="row">
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Type</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Error Log</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($errorlogs)}} of {{count($errorlogs)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $errorlogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

