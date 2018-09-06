@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Routes</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <?php if($success==1): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        SUCCESS : Route has been added. 
                    </div>
                    <?php elseif($success==0): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        DANGER : Failed adding route. Please check field.
                    </div>
                    <?php else: endif; ?>
                    <form method="get" action="{{ url('route/store_route') }}" style="display: inline-block;width:89%;">
                        <div class="row">                        
                            <div class="form-group col-md-10">
                                <input type="hidden" name="route_id" id="new_id">
                                <input type="text" class="form-control" name="route" placeholder="Add new route" autocomplete="off" id="new_route">
                            </div>
                            <div class="col-sm-12 col-md-2">                               
                                <button type="submit" class="btn btn-block btn-primary" id="button">Add new route</button>
                            </div>                                                
                        </div>
                    </form>
                    <button class="btn btn-block btn-danger" style="width:10%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                    <div class="row">
                        <div class="col-sm-12">                         
                            <table class="table table-striped table-bordered display" id="routeTable" role="grid" aria-describedby="exampleTableSearch_info" >
                                <thead>
                                    <tr role="row">
                                        <th style="width:5%;">Edit</th>
                                        <th class="text-left">Route</th>
                                        <th>Last Modified</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($routes as $route)
                                    <tr role="row" class="odd">
                                        <td style="width:5%;">
                                            <div class="icondemo vertical-align-middle" style="cursor:pointer;" id="{{ $route->id }}-{{ $route->route }}">
                                                <i class="icon wb-edit" aria-hidden="true"></i>                                                
                                            </div>
                                        </td>
                                        <td  class="text-left">{{ $route->route }}</td>
                                        <td>{{ $route->last_modified }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <!--tr role="row">
                                        <th class="text-left">Route</th>
                                        <th>Last Modified</th>                                        
                                    </tr-->
                                </tfoot>
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
    $('#routeTable td div').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        console.log(split_val[0]);
        $('#new_route').val(split_val[1]);
        $('#new_id').val(split_val[0]);
        $('#button').html('Save changes');        
    });    
});

function clearFields(){
    document.getElementById('new_route').value = '';
    document.getElementById('new_id').value = '';
}
</script>
@endsection