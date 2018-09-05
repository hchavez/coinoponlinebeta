@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Sizes</h3>
            </div>
            <div class="panel-body">
                <?php if($success==1): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    SUCCESS : Size has been added. 
                </div>
                <?php elseif($success==0): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    DANGER : Failed adding size. Please check field.
                </div>
                <?php else: endif; ?>
                <div class="row">                    
                    <div class="col-md-6">
                        <table class="table table-bordered" id="sizes_table">
                            <thead>
                              <tr>
                                <th style="width:5%;">Edit</th>
                                <th>Size</th>                                                      
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($size as $data)
                                <tr>
                                    <td style="width:5%;">
                                        <div class="icondemo vertical-align-middle" style="cursor:pointer;"  id="{{ $data->id }}-{{ $data->size }}">
                                            <i class="icon wb-edit" aria-hidden="true"></i>                                                
                                        </div>
                                    </td>
                                    <td>{{ $data->size }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                        <form method="get" action="{{ url('machine-sizes/store_sizes') }}">
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Add New Size</label>
                            <input type="hidden" name="new_id" id="new_id">                          
                            <input type="text" class="form-control" name="new_sizes" placeholder="Add new route" autocomplete="off" id="new_sizes">
                        </div>                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                        <button class="btn btn-block btn-danger" style="width:15%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
<script>
$(document).ready(function(){
    $('#sizes_table td div').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#new_sizes').val(split_val[1]);
        $('#new_id').val(split_val[0]);        
    });    
});

function clearFields(){
    document.getElementById('new_sizes').value = '';
    document.getElementById('new_id').value = '';
}
</script>
@endsection