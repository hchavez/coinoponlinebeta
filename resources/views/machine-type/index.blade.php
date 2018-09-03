@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">    
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Machine Types</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">                    

                    <div class="row">
                        <div class="col-sm-12">
                            <?php if($success==1): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                SUCCESS : MAchine Type has been added. 
                            </div>
                            <?php elseif($success==0): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                DANGER : Failed adding Machine Type. Please check field.
                            </div>
                            <?php else: endif; ?>
                            <form method="get" action="{{ url('machine-type/store_machineType') }}" style="display: inline-block;width:89%;">
                                <div class="row">                        
                                    <div class="form-group col-md-10">
                                        <input type="hidden" name="machinetype_id" id="machinetype_id">
                                        <input type="text" class="form-control" name="new_machinetype" placeholder="Enter Machine Type" autocomplete="off" id="new_machinetype">
                                    </div>
                                    <div class="col-sm-12 col-md-2">                               
                                        <button type="submit" class="btn btn-block btn-primary" id="button">Save</button>
                                    </div>                                                
                                </div>
                            </form>   
                            <button class="btn btn-block btn-danger" style="width:10%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                            <table class="table table-striped table-bordered display" id="machine_type_table" role="grid" aria-describedby="exampleTableSearch_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">Name</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                    <tr role="row" class="odd">
                                        <td class="text-left">{{ $type->machine_type }}</td>
                                        <td>{{ $type->created_at }}</td>
                                        <td>
                                            <div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
                                                <button type="button" class="btn btn-outline btn-default edit_me" id="{{ $type->id }}-{{ $type->machine_type }}">
                                                  <i class="icon wb-edit" aria-hidden="true"></i>
                                                </button>                                                
                                                <button type="button" class="btn btn-outline btn-default">
                                                  <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>
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
    $('#machine_type_table td div button.edit_me').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#new_machinetype').val(split_val[1]);
        $('#machinetype_id').val(split_val[0]);              
    });    
});

function clearFields(){
    document.getElementById('new_machinetype').value = '';
    document.getElementById('machinetype_id').value = '';
}
</script>
@endsection