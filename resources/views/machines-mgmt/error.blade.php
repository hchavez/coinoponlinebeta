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

                    <div class="row">
                        <div class="col-md-12">                              
                            <table border="0" cellspacing="5" cellpadding="5" id="filterDate">
                                <tbody>
                                    <tr>
                                        <td><b>Date Filter</b> </td>
                                        <td>   
                                            <input name="min" id="min" class="form-control form_datetime" type="text" data-date-format="yyyy/mm/dd" placeholder="From">                                           
                                        </td>
                                        <td>    
                                            <input name="max" id="max" class="form-control" type="text" data-date-format="yyyy/mm/dd" placeholder="To">                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <table id="json_table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">                                        
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Type</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Error Log</th>                                        
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>                            
                        </div>
                            
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <div id="pagination_links"><ul></ul></div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

