@extends('layouts.app-left-sites-template')

@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Area</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                 

                    <div class="row"><div class="col-sm-12">
                             <form class="form-horizontal" role="form" method="POST" action="{{ route('route.update', ['id' => $route->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $route->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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