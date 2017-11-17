
@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Update Machine</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-management.update', ['id' => $machine->machine_id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="form-group{{ $errors->has('machine_name') ? ' has-error' : '' }}">
                            <label for="machine_name" class="col-md-4 control-label">Machine Name</label>

                            <div class="col-md-6">
                                <input id="machinename" type="text" class="form-control" name="machine_name" value="{{ $machine->machine_name }}" required autofocus>

                                @if ($errors->has('machinename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('machine_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('serial_no') ? ' has-error' : '' }}">
                            <label for="serial_no" class="col-md-4 control-label">Serial No</label>

                            <div class="col-md-6">
                                <input id="serial_no" type="text" class="form-control" name="serial_no" value="{{ $machine->serial_no }}" required>

                                @if ($errors->has('serial_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $machine->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            <label for="comments" class="col-md-4 control-label">Comments</label>

                            <div class="col-md-6">
                                <input id="comments" type="text" class="form-control" name="comments" value="{{ $machine->comments }}" required>

                                @if ($errors->has('comments'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Machine Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="machine_type">
                                    @foreach ($machine_types as $machine_type)
                                        <option {{ $machine->machine_type == $machine_type->id ? 'selected' : ''}} value="{{$machine_type->id}}">{{$machine_type->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">Machine Model</label>
                            <div class="col-md-6">
                                <select class="form-control" name="machine_model">
                                    @foreach ($machine_models as $machine_model)
                                        <option {{ $machine->machine_model == $machine_model->type_id ? 'selected' : ''}} value="{{$machine_model->id}}">{{$machine_model->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ $machine->location }}" required>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city_id">
                                    @foreach ($cities as $city)
                                        <option {{$machine->city == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
            
              
             
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Picture</label>
                            <div class="col-md-6">
                                <img src="../../{{$machine->picture }}" width="50px" height="50px"/>
                                <input type="file" id="picture" name="picture" />
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
