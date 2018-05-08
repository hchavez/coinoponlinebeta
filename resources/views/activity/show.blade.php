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
                        <table class="table table-bordered" id="dashboard_sort">
                            <thead>
                                <tr role="row">                            
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>URL</th>                            
                                    <th>Ip Address</th>
                                    <th width="500px">User Agent</th>
                                    <th>Date</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                @if($logs->count())
                                @foreach($activity as $key => $log)                                
                                <tr role="row" class="odd">                            
                                    <td class="hidden-xs">{{ $log->username }}</td>
                                    <td class="hidden-xs">{{ $log->subject }}</td>
                                    <td class="hidden-xs text-success">{{ $log->url }}</td>                            
                                    <td class="hidden-xs text-warning">{{ $log->ip }}</td>
                                    <td class="hidden-xs text-danger">{{ $log->agent }}</td>
                                    <td>{{ $log->updated_at }}</td>                            
                                </tr>                                
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr role="row">                            
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>URL</th>                            
                                    <th>Ip Address</th>
                                    <th width="500px">User Agent</th>
                                    <th>Date</th>                            
                                </tr>
                            </tfoot>
                        
                        
                        </table> 
                    </div>
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-sm-12 text-center">
                        <div class="dataTables_paginate paging_simple_numbers" id="custom_paging">
                            {{ $activity->links() }}
                        </div>                            
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>  

</div>    
@endsection