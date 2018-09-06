@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Meter</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="get" action="" style="width:100%">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Meters</label>
                                <input type="text" class="form-control" id="inputBasicFirstName" name="inputFirstName" placeholder="Meters" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">test</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection