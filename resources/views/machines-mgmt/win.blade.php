@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Type: {{ $machine->machine_type }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Model: {{ $machine->machine_model }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Serial No: {{ $machine->serial_no }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Site: {{ $machine->site }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> Description: {{ $machine->machine_description }}</label>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> IP Address: {{ $machine->ip_address }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                        
                        </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <table border="0" cellspacing="5" cellpadding="5" id="filterDate">
                                <tbody>
                                    <tr>
                                        <td><b>Date Filter</b> </td>
                                        <td>   
                                            <input name="min" id="min" class="form-control" type="text" data-date-format="yyyy/mm/dd" placeholder="From">                                           
                                        </td>
                                        <td>    
                                            <input name="max" id="max" class="form-control" type="text" data-date-format="yyyy/mm/dd" placeholder="To">                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <table id="dashboard_sort" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >testPlay</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >winResult</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >totalWon</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >playIndex</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >owedWin</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >excessWin</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockLeft</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockRemoved</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockAdded</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >nTimesOfPlay</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if($machine->id != '28')
                                    @foreach ($winlogs as $winlog)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $winlog->id }} </td>                                        
                                        <td class="hidden-xs">{{ $winlog->testPlay }}</td>
                                        <td class="hidden-xs">{{ $winlog->winResult }}</td>
                                        <td class="hidden-xs">{{date('d/m/Y h:i A', strtotime($winlog->created_at))}}</td>
                                        <td class="hidden-xs">{{ $winlog->totalWon }}</td>
                                        <td class="hidden-xs">{{ $winlog->playIndex }}</td>
                                        <td class="hidden-xs">{{ $winlog->owedWin }}</td>
                                        <td class="hidden-xs">{{ $winlog->excessWin }}</td>
                                        <td class="hidden-xs">{{ $winlog->stockLeft }}</td>
                                        <td class="hidden-xs">{{ $winlog->stockRemoved }}</td>
                                        <td class="hidden-xs">{{ $winlog->stockAdded }}</td>
                                        <td class="hidden-xs">{{ $winlog->nTimesOfPlay }}</td>

                                        <td class="hidden-xs">{{ $winlog->status }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr role="row">
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>                                        
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >testPlay</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >winResult</th>
                                        <th width="28%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >totalWon</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >playIndex</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >owedWin</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >excessWin</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockLeft</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockRemoved</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >stockAdded</th>
                                        <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >nTimesOfPlay</th>
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

