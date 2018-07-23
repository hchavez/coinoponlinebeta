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
                                   <strong><td><a href="#" data-toggle="modal" data-target="#myModal{{$theme->id}}" style="text-decoration: none;">
                                 {{ $theme->theme_name  }} 
                                  </a></td></strong>
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



@foreach ($themelists as $theme)
<div id="myModal{{$theme->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <form action="{{ URL::to('theme-lists/update') }}" method="post" id="status-update" >   
       
        <meta id="token" name="token" content="{ { csrf_token() } }">     
        {{ csrf_field() }}   
        <input type="hidden" name="themeid" value="{{ $theme->id }} ">
        
                            
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="row row-lg">
                                 <div class="col-md-12 col-lg-4">
                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Theme Name: </label>
                                                <div class="col-md-6">
                                                     <input id="theme_name" type="text" class="form-control" name="theme_name" value="{{ $theme->theme_name }}"  style="margin-top: -10px !important;" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Avg Weight: </label>
                                                <div class="col-md-6">
                                                    <input id="avgWeight" type="text" class="form-control" name="avgWeight" value="{{ $theme->avgWeight }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">slipVoltage: </label>
                                                <div class="col-md-6">
                                                  <input id="slipVoltage" type="text" class="form-control" name="slipVoltage" value="{{ $theme->slipVoltage }}"  required>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">pkVoltage: </label>
                                                <div class="col-md-6">
                                                   <input id="pkVoltage" type="text" class="form-control" name="pkVoltage" value="{{ $theme->pkVoltage }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">retVoltage: </label>
                                                <div class="col-md-6">
                                                     <input id="retVoltage" type="text" class="form-control" name="retVoltage" value="{{ $theme->retVoltage }}"  required>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <!-- End Example Horizontal Form -->
                                </div>
                                

                                <div class="col-md-12 col-lg-4">
                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">slipPWM: </label>
                                                <div class="col-md-6">
                                                   <input id="slipPWM" type="text" class="form-control" name="slipPWM" value="{{ $theme->slipPWM }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">pkupPWM: </label>
                                                <div class="col-md-6">
                                                     <input id="pkupPWM" type="text" class="form-control" name="pkupPWM" value="{{ $theme->pkupPWM }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">retPWM: </label>
                                                <div class="col-md-6">
                                                  <input id="retPWM" type="text" class="form-control" name="retPWM" value="{{ $theme->retPWM }}"  required>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">diffPickRetPWM: </label>
                                                <div class="col-md-6">
                                                    <input id="diffPickRetPWM" type="text" class="form-control" name="diffPickRetPWM" value="{{ $theme->diffPickRetPWM }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                   



                                    </div>
                                    <!-- End Example Horizontal Form -->
                                </div>



                                <div class="col-md-12 col-lg-4">

                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">  

                                           <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">totalToyPurchaseCost: </label>
                                                <div class="col-md-6">
                                                    <input id="totalToyPurchaseCost" type="text" class="form-control" name="totalToyPurchaseCost" value="{{ $theme->totalToyPurchaseCost }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">playsPerWin: </label>
                                                <div class="col-md-6">
                                                   <input id="playsPerWin" type="text" class="form-control" name="playsPerWin" value="{{ $theme->playsPerWin }}"  required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">stockLeft: </label>
                                                <div class="col-md-6">
                                                    <input id="stockLeft" type="text" class="form-control" name="stockLeft" value="{{ $theme->stockLeft }}"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Product Code: </label>
                                                <div class="col-md-6">
                                                  <select class="selectpicker form-control" name="productCode" id="productCode" data-live-search="true"> 
                                                          
                                                             @foreach ($toylist as $toy)
                                                            <option {{ $theme->productCode == $toy->id ? 'selected' : ''}} value="{{$toy->id}}">{{ $toy->toy_name }}</option>
                                                            @endforeach
                                                
                                                </select> 
                                                </div>
                                            </div>
                                        </div>


                                    </div>





                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                 <input class="btn btn-primary" type="submit" value="Update" />
                 <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
            
        </div>
    </form>
    </div>
</div>
@endforeach



@endsection

