@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Manage Users</h3>
        
    </header>
    <div class="panel-body">
        <div id="site_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">               
                <!--div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div-->
                    
                <div class="col-sm-12">       
                    <a href="{{ route('user-mgmt.create') }}"><button type="button" class="btn btn-default" style="float:right;"><i class="icon wb-plus" aria-hidden="true"></i> Add New User</button></a>
                    <div id="filterDiv"><br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="userDiv" role="grid" aria-describedby="exampleTableSearch_info" >
                        
                        <thead>
                            <tr role="row"  style="border-top: 1px solid #e4eaec;">
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>                              
                                <th>Date Created</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            @foreach ($getUser as $user)
                                <tr role="row" style="color:<?php echo ($user->status!='1')? '#ffc2c2' : 'none'; ?>">
                                  <td style="width:20%;text-transform: capitalize;">{{ $user->firstname }} {{ $user->lastname }}</td>
                                  <td style="width:20%;">{{ $user->username }}</td>
                                  <td style="width:20%;">{{ $user->email }}</td>                              
                                  <td style="width:20%;">{{ $user->created_at }}</td>
                                  <td style="width:20%;">{{ $user->updated_at }}</td> 
                                  <td style="width:20%;"><?php echo ($user->status=='1')? 'Active' : 'Disabled'; ?></td>
                                  <td style="width:20%;">
                                    <a href="{{ route('user-mgmt.show', ['id' => $user->userID]) }}">
                                        <div class="float-left">
                                            <button type="button" class="btn btn-primary btn-sm ladda-button" data-style="slide-right" data-plugin="ladda">
                                              <span class="ladda-label">View<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
                                            <span class="ladda-spinner"></span></button>
                                        </div>
                                    </a>
                                  </td>
                                </tr>
                            @endforeach 
                        </tbody>
                        <!--tfoot>
                            <tr role="row">
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>                              
                                <th>Date Created</th>
                                <th>Last Login</th>
                                <th>View</th>
                            </tr>
                        </tfoot-->
                        
                    </table>
                </div>
            </div>            
        </div>
    </div>
</div>
<style>
.select2-container{width:100% !important;}
.select2-container .select2-choice > .select2-chosen{color:#333 !important;}
</style>
<script>
$(document).ready(function() {
    $('#userDiv').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });
    
    //Filter customization   
    $('#userDiv select').each(function(i) {
        var label = ['Name', 'Username', 'Email', 'Date Created', 'Last Login','Status', 'View'];
        $(this).attr('id', 'filter'+(i+1));        
        $("#filter" + (i+1)).select2({
            placeholder: label[i]
        });        
    });  
   
});
</script>

@endsection
 
