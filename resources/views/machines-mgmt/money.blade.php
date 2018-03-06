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

                    <div class="row"><div class="col-sm-12">
                            <table id="dashboard_sort" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" >ID</th>
                                        <th width="20%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forPlay</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forClick</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >pricePlay</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>

                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($moneylogs as $moneylog)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $moneylog->id }} </td>
                                        <td class="hidden-xs">{{date('d/m/Y h:i A', strtotime($moneylog->created_at))}}</td>
                                        <td class="hidden-xs">{{ $moneylog->coinIn }}</td>
                                        <td class="hidden-xs">{{ $moneylog->ttlCoinIn }}</td>
                                        <td class="hidden-xs">{{ $moneylog->billIn }}</td>
                                        <td class="hidden-xs">{{ $moneylog->ttlBillIn }}</td>
                                        <td class="hidden-xs">{{ $moneylog->ttlMoneyIn }}</td>
                                        <td class="hidden-xs">{{ $moneylog->forPlay }}</td>
                                        <td class="hidden-xs">{{ $moneylog->forClick }}</td>
                                        <td class="hidden-xs">{{ $moneylog->pricePlay }}</td>
                                        <td class="hidden-xs">{{ $moneylog->credits }}</td>
                                        <td class="hidden-xs">{{ $moneylog->status }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr role="row">
                                        <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>              
                                        <th width="25%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forPlay</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forClick</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >pricePlay</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>

                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
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
