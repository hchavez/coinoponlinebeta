@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Site Type</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <!--div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('site-type.create') }}">Add new sitetype</a></label></div>
                        </div>
                        
                    </div-->

                    <div class="row">
                        <div class="col-sm-12">
                            <?php if($success==1): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                SUCCESS : Site Type has been added. 
                            </div>
                            <?php elseif($success==0): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                DANGER : Failed adding Site Type. Please check field.
                            </div>
                            <?php else: endif; ?>
                            <form method="get" action="{{ url('site-type/store_sitetype') }}" style="display: inline-block;width:89%;">
                                <div class="row">                        
                                    <div class="form-group col-md-10">
                                        <input type="hidden" name="sitetype_id" id="sitetype_id">
                                        <input type="text" class="form-control" name="new_sitetype" placeholder="Enter Site Type" autocomplete="off" id="new_sitetype">
                                    </div>
                                    <div class="col-sm-12 col-md-2">                               
                                        <button type="submit" class="btn btn-block btn-primary" id="button">Save</button>
                                    </div>                                                
                                </div>
                            </form>   
                            <button class="btn btn-block btn-danger" style="width:10%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                            <table class="table table-striped table-bordered display" id="site_type_table" role="grid" aria-describedby="exampleTableSearch_info" >
                                <thead>
                                    <tr role="row">
                                        <!--th style="width:5%;">Edit</th-->
                                        <th class="text-left">Site Type</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sitetypes as $sitetype)
                                    <tr role="row" class="odd">
                                        <!--td style="width:5%;">
                                            <div class="icondemo vertical-align-middle" style="cursor:pointer;" id="{{ $sitetype->id }}-{{ $sitetype->site_type }}">
                                                <i class="icon wb-edit" aria-hidden="true"></i>                                                
                                            </div>
                                        </td-->
                                        <td class="text-left">{{ $sitetype->site_type }}</td>
                                        <td>{{ $sitetype->last_modified }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                   
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
/*$(document).ready(function(){
    $('#site_type_table td div').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#new_sitetype').val(split_val[1]);
        $('#sitetype_id').val(split_val[0]);              
    });    
});*/

function clearFields(){
    document.getElementById('new_sitetype').value = '';
    document.getElementById('sitetype_id').value = '';
}
</script>
@endsection