@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Machine Model</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                    <div class="row"><div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-model.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                          <label for="name" class="col-md-4 control-label">Machine Model</label>
                               
                                    <div class="col-md-6">
                                        <input id="title" model="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                          <label for="name" class="col-md-4 control-label">Machine Model Code</label>
                               
                                    <div class="col-md-6">
                                        <input id="code" model="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                        @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Model Types</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="type_id">
                                            @foreach ($types as $type)
                                            <option value="{{$type->id}}">{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create
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