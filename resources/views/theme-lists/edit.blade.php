@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Theme</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                 

                    <div class="row"><div class="col-sm-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('theme-lists.update', ['id' => $themelists->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group{{ $errors->has('theme_name') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="theme_name" type="text" class="form-control" name="theme_name" value="{{ $themelists->theme_name }}">
                                @if ($errors->has('theme_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                        </div></div>

               
                </div>


            </div>
        </div>
    </div>
</div>

@endsection



@extends('layouts.app-left-admin-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">             
             <div class="panel form-icons">
                <div class="panel-heading">
                  <h3 class="panel-title">Update Theme Form</h3>
                </div>
                 
                <form class="form-horizontal" role="form" method="POST" action="{{ route('theme-lists.update', ['id' => $themelists->id]) }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                {{ csrf_field() }}
                <div class="panel-body container-fluid">
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Theme Name </label>
                        <div class="example">
                          <div class="input-group {{ $errors->has('theme_name') ? ' has-error' : '' }}">
                            <input id="theme_name" type="text" class="form-control" name="theme_name" value="{{ old('theme_name') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Avg Weight </label>
                        <div class="example">
                          <div class="input-group">
                            <input id="avgWeight" type="text" class="form-control" name="avgWeight" value="{{ old('avgWeight') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Slip Voltage </label>
                        <div class="example">
                          <div class="input-group"> 
                            <input id="slipVoltage" type="text" class="form-control" name="slipVoltage" value="{{ old('slipVoltage') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Pk Voltage </label>
                        <div class="example">
                          <div class="input-group">     
                            <input id="pkVoltage" type="text" class="form-control" name="pkVoltage" value="{{ old('pkVoltage') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Ret Voltage </label>
                        <div class="example">
                          <div class="input-group">            
                           <input id="retVoltage" type="text" class="form-control" name="retVoltage" value="{{ old('retVoltage') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label"> Slip PWM </label>
                        <div class="example">
                          <div class="input-group">  
                           <input id="slipPWM" type="text" class="form-control" name="slipPWM" value="{{ old('slipPWM') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label"> Pkup PWM </label>
                        <div class="example">
                          <div class="input-group">             
                           <input id="pkupPWM" type="text" class="form-control" name="pkupPWM" value="{{ old('pkupPWM') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Ret PWM </label>
                        <div class="example large-icon">
                          <div class="input-group">             
                           <input id="retPWM" type="text" class="form-control" name="retPWM" value="{{ old('retPWM') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Diff Pick RetPWM </label>
                        <div class="example large-icon">
                          <div class="input-group">             
                            <input id="diffPickRetPWM" type="text" class="form-control" name="diffPickRetPWM" value="{{ old('diffPickRetPWM') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Toy Purchase Cost </label>
                        <div class="example small-icon">
                          <div class="input-group">              
                            <input id="totalToyPurchaseCost" type="text" class="form-control" name="totalToyPurchaseCost" value="{{ old('totalToyPurchaseCost') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                            <label class=" form-control-label">Plays Per Win </label>
                        <div class="example round-input-control">
                          <div class="input-group">             
                            <input id="playsPerWin" type="text" class="form-control" name="playsPerWin" value="{{ old('playsPerWin') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Stock Left </label>
                        <div class="example">
                          <div class="input-group">             
                            <input id="stockLeft" type="text" class="form-control" name="stockLeft" value="{{ old('stockLeft') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                       <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Product Code </label>
                        <div class="example">
                          <div class="input-group">             
                                <select class="selectpicker form-control" name="productCode" id="productCode" data-live-search="true"> 
                                            <option value="">-- Select Product --</option>
<!--                                            @foreach ($machine_types as $mtype)
                                            <option value="{{$mtype->id}}" data-tokens="{{$mtype->machine_type}}"> {{$mtype->machine_type}} </option>
                                            @endforeach-->
                                </select>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                  <center>
                    <button type="submit" class="btn btn-primary">
                        Add New Machine
                    </button></center>


            </form>
                 
                 
              </div>

        </div>
    </div>
</div>

@endsection