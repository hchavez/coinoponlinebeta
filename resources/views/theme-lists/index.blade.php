@extends('layouts.app-left-admin-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Theme Lists</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                <a class="btn btn-primary" href="{{ route('theme-lists.create') }}">Add New Theme</a></label></div>
                        </div>
                        
                    </div>

                    <div class="row"><div class="col-sm-12">
<!--                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>-->
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                     <thead>
                            <tr role="row">
                                <th>Theme</th>	
                                <th>Avg Weight</th>	
                                <th>Slip Voltage</th>	
                                <th>Pk Voltage</th>	
                                <th>Ret Voltage</th>
                                <th>Slip PWM</th>
                                <th>PickUp PWM</th>
                                <th>Ret PWM</th>
                                <th>Diff Pick RetPWM</th>
                                <th>Toy Cost</th>
                                <th>Play Per Win</th>
                                <th>Stock Left</th>
                                <th>Product Code</th>
                                <th>Active</th>
                        </thead>
                                <tbody>

                                     @foreach ($themelists as $theme)
                            <tr role="row">
                                <td> {{ $theme->theme_name  }} </td>
                                <td> {{ $theme->avgWeight  }} </td>
                                <td> {{ $theme->slipVoltage  }}</td>
                                <td> {{ $theme->pkVoltage  }}</td>
                                <td> {{ $theme->retVoltage }}</td>
                                <td> {{ $theme->slipPWM }}</td>
                                <td> {{ $theme->pkupPWM }}</td>
                                <td> {{ $theme->retPWM }}</td>
                                <td> {{ $theme->diffPickRetPWM }}</td>
                                <td> {{ $theme->totalToyPurchaseCost }}</td>
                                <td> {{ $theme->playsPerWin }}</td>
                                <td> {{ $theme->stockLeft }}</td>
                                <td> {{ $theme->productCode }}</td>
                                <?php if($theme->status == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>

                            </tr>
                            @endforeach
                                </tbody>
                                <tfoot>
                                    
                                    
                            <tr role="row">
                                <th>Theme</th>	
                                <th>Avg Weight</th>	
                                <th>Slip Voltage</th>	
                                <th>Pk Voltage</th>	
                                <th>Ret Voltage</th>
                                <th>Slip PWM</th>
                                <th>PickUp PWM</th>
                                <th>Ret PWM</th>
                                <th>Diff Pick RetPWM</th>
                                <th>Toy Cost</th>
                                <th>Play Per Win</th>
                                <th>Stock Left</th>
                                <th>Product Code</th>
                                <th>Active</th>
                      
                                </tfoot>
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

