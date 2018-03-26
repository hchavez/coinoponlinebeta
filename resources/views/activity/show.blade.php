@extends('layouts.app-left-profile-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Activities</h3>
                <div class="page-header-actions">                  
                </div>
            </div>
            
            <div class="panel-body">               
                <div class="row">                      
                    <div class="col-sm-12">  
                        <table class="display table table-hover dataTable table-striped  dtr-inline table-responsive" role="grid" aria-describedby="exampleTableSearch_info" cellspacing="0" width="100%">
                            <thead>
                                <tr role="row">
                                    <th>Name</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>                                
                                </tr>                            
                            </thead>
                            <tbody>
                            @foreach ($users as $users)                            
                                <tr role="row">
                                    <td> {{ $users->username }} </td>                                    
                                    <td>{{date('d/m/Y h:i A', strtotime($users->created_at))}}</td>
                                    <td>{{date('d/m/Y h:i A', strtotime($users->updated_at))}}</td>
                                </tr>                            
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                                        
                            </tr>                            
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>            
        </div>
    </div>
</div>  

</div>    
@endsection