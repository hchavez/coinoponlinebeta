@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Keys</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>KeyNo</th>
                                <th>Comments</th>                         
                              </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan="2">No Records found</td></tr>
                            </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Add New Key</label>
                            <input type="text" class="form-control" id="keynumber" name="keynumber" placeholder="Enter Key No." autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Enter Comments"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Save</button>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection