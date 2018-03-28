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
                        <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>URL</th>                            
                            <th>Ip Address</th>
                            <th width="500px">User Agent</th>
                            <th>Date</th>                            
                        </tr>
                        @if($logs->count())
                        @foreach($activity as $key => $log)
                        <?php 
                       // echo '<br>'.$user_id.' - '.$log->user_id;
                        //if($user_id == $log->user_id){ ?>
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $log->username }}</td>
                            <td>{{ $log->subject }}</td>
                            <td class="text-success">{{ $log->url }}</td>                            
                            <td class="text-warning">{{ $log->ip }}</td>
                            <td class="text-danger">{{ $log->agent }}</td>
                            <td>{{ $log->updated_at }}</td>                            
                        </tr>
                        <?php// } ?>
                        @endforeach
                        @endif
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