@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Sites</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                    <div class="row"><div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('site.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">

                                    <div class="col-md-6">
                                        <input id="site_name" type="text" class="form-control" name="site_name" value="{{ old('site_name') }}" required autofocus>

                                        @if ($errors->has('site_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('site_name') }}</strong>
                                        </span>
                                        @endif
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