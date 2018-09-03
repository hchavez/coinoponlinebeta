@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Machine Model</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">                 
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="get" action="#" style="display: inline-block;width:89%;">
                                <div class="row">                        
                                    <div class="form-group col-md-2">
                                        <input type="hidden" name="machinemodel_id" id="machinemodel_id">
                                        <input type="text" class="form-control" name="new_machinemodel" placeholder="Enter Machine Model" autocomplete="off" id="new_machinemodel">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                            <select class="form-control" name="machine_type">
                                              <option>---Select Machine Type---</option>
                                              @foreach ($types as $type)
                                              <option value="{{ $type->id }}">{{ $type->machine_type }}</option>
                                              @endforeach                                              
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="hidden" name="machine_code" id="machine_code_id">
                                        <input type="text" class="form-control" name="machine_code" placeholder="Enter Machine Model Code" autocomplete="off" id="machine_code">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                            <select class="form-control" name="machine_size">
                                              <option>---Select Machine Size---</option>                                              
                                              <option>Extreme</option>
                                              <option>Jumbo</option>    
                                              <option>Large</option>
                                              <option>Maxi</option>
                                              <option>Mini</option>
                                              <option>Standard</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">                               
                                        <button type="submit" class="btn btn-block btn-primary" id="button">Save</button>
                                    </div>                                                
                                </div>
                            </form>   
                            <button class="btn btn-block btn-danger" style="width:10%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                            <table class="table table-striped table-bordered display" id="machine_model_table" role="grid" aria-describedby="exampleTableSearch_info" >
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">Machine Model</th>
                                        <th>Machine Model Code</th>
                                        <th>Machine Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $model)
                                    <tr role="row" class="odd">
                                        <td class="text-left">{{ $model->machine_model }}</td>
                                        <td>{{ $model->machine_model_code }}</td>
                                        <td>{{ $model->machine_type }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-default edit_me" id="{{ $model->id }}-{{ $model->machine_model }}">
                                                <i class="icon wb-edit" aria-hidden="true"></i>
                                            </button>  
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div> 
                    
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
<script>
$(document).ready(function(){
    $('#machine_model_table').DataTable({
        scrollY:        "600px",
        scrollCollapse: true,
        paging:         false,
        searching: false,
        info: false
    });
    
    $('#machine_model_table td button.edit_me').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#new_machinemodel').val(split_val[1]);
        $('#machinemodel_id').val(split_val[0]);              
    });    
});

function clearFields(){
    document.getElementById('new_machinemodel').value = '';
    document.getElementById('machinemodel_id').value = '';
}
</script>
@endsection