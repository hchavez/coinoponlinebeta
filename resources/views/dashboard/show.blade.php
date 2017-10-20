@extends('machines-mgmt.base')

@section('action-content')

<!-- Main content -->
    <section class="content">
      <div class="box">
          
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('machine-management/show', [$machine->machine_id]) }}">{{ $machine->machine_name }} --</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <li class="active"><a href="{{ url('machine-management/show', [$machine->machine_id]) }}">Error Logs</a></li>
              <li><a href="{{ url('machine-management/money', [$machine->machine_id]) }}">Money Logs</a></li>
              <li><a href="{{ url('machine-management/win', [$machine->machine_id]) }}">Win Logs</a></li>
              <li><a href="{{ url('machine-management/goals', [$machine->machine_id])}}">Goals Logs</a></li>
            
              <li><a href="{{ url('machine-management/accounts',$machine->machine_id)}}">Accounts</a></li>
              <li><a href="{{ url('machine-management/cash_boxes',$machine->machine_id)}}">Cash Boxes</a></li>
              <li><a href="{{ url('machine-management/product_definations',$machine->machine_id)}}">Product Definations</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('machine-management/machine_settings',$machine->machine_id)}}">Machine</a></li>
                  <li><a href="{{ url('machine-management/claw',$machine->machine_id)}}">Claw</a></li>
                  <li><a href="{{ url('machine-management/game',$machine->machine_id)}}">Game</a></li>

                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
          
          
  <div class="box-header">
    <div class="row">
        
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">Machine Name</label>
                        <div class="col-sm-9">
                          {{ $machine->machine_name }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">Machine Type: </label>
                        <div class="col-sm-9">
                           {{ $machine->machine_name }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">Location:</label>
                        <div class="col-sm-9">
                          {{ $machine->location }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">Date Added:</label>
                        <div class="col-sm-9">
                           {{ $machine->created_at }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label"> Description:</label>
                        <div class="col-sm-9">
                           {{ $machine->description }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">Machine Model: </label>
                        <div class="col-sm-9">
                           {{ $machine->machine_model }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">City:</label>
                        <div class="col-sm-9">
                           {{ $machine->city_name }}
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                                  <label class="col-sm-3 control-label">STATUS:</label>
                        <div class="col-sm-9">
                          {{ $machine->status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  </div>
  <!-- /.box-header -->
  
 <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
               <tr role="row">
                <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                <th width="30%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Error Logs</th>
              <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($errorlogs as $errorlog)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $errorlog->id }} </td>
                   <td>{{date('F d, Y H:i:s', strtotime($errorlog->dateAdded))}}</td>
                  <td class="hidden-xs">{{ $errorlog->error }}</td>
                  <td class="hidden-xs">{{ $errorlog->status }}</td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                 <tr role="row">
                      <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                <th width="30%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Error Logs</th>
              <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
            </tr>
              </tr>
            </tfoot>
          </table>
 </div>
    <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($errorlogs)}} of {{count($errorlogs)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $errorlogs->links() }}
          </div>
        </div>
      </div>
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
     
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      
   
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
  
@endsection
