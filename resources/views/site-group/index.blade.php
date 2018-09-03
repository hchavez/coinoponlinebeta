@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Site Group</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <!--div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('site-group.create') }}">Add new sitegroup</a></label></div>
                        </div>
                        
                    </div-->

                    <div class="row"><div class="col-sm-12">
                            <?php if($success==1): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                SUCCESS : Site Group has been added. 
                            </div>
                            <?php elseif($success==0): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                DANGER : Failed adding Site Group. Please check field.
                            </div>
                            <?php else: endif; ?>
                            <form method="get" action="{{ url('site-group/store_sitegroup') }}" style="display: inline-block;width:89%;">
                                <div class="row">                        
                                    <div class="form-group col-md-10">
                                        <input type="hidden" name="sitegroup_id" id="sitegroup_id">
                                        <input type="text" class="form-control" name="new_sitegroup" placeholder="Enter Site Type" autocomplete="off" id="new_sitegroup">
                                    </div>
                                    <div class="col-sm-12 col-md-2">                               
                                        <button type="submit" class="btn btn-block btn-primary" id="button">Save</button>
                                    </div>                                                
                                </div>
                            </form>   
                            <button class="btn btn-block btn-danger" style="width:10%;display: inline-block;vertical-align: top;" onclick="clearFields()">Clear Field</button>
                    
                            <table class="table table-striped table-bordered display" id="site_group_table" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th style="width:5%;">Edit</th>
                                        <th class="text-left">Site Group Name</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sitegroups as $sitegroup)
                                    <tr role="row" class="odd">
                                        <td style="width:5%;">
                                            <div class="icondemo vertical-align-middle" style="cursor:pointer;" id="{{ $sitegroup->id }}-{{ $sitegroup->site_group_name }}">
                                                <i class="icon wb-edit" aria-hidden="true"></i>                                                
                                            </div>
                                        </td>
                                        <td class="text-left">{{ $sitegroup->site_group_name }}</td>
                                        <td>{{ $sitegroup->last_modified }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>                              
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>
<script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
<script>
$(document).ready(function(){
    $('#site_group_table').DataTable({
        scrollY:        "500px",
        scrollCollapse: true,
        paging:         false,
        searching: false,
        info: false
    });
    
    $('#site_group_table td div').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#new_sitegroup').val(split_val[1]);
        $('#sitegroup_id').val(split_val[0]);              
    });    
});

function clearFields(){
    document.getElementById('new_sitegroup').value = '';
    document.getElementById('sitegroup_id').value = '';
}
</script>
@endsection