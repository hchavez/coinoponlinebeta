@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Checklist</h3>
            </div>
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th style="width:5%;">Edit</th>
                                <th>Checklist</th>                             
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">No results found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="inputBasicFirstName">Name</label>
                          <input type="text" class="form-control" id="checklist_name" name="checklist_name" placeholder="Enter checklist name" autocomplete="off">
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