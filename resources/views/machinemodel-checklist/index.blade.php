@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Model Checklist</h3>
            </div>
            
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="example-title">Machine Model</h4>
                        <div class="form-group">
                            <select class="form-control">
                              <option>---Select Machine Model---</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <h4 class="example-title">Check List</h4>                            
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" id="inputUnchecked">
                              <label for="inputUnchecked">Unchecked</label>
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" id="inputChecked">
                              <label for="inputChecked">Checked</label>
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" id="inputChecked">
                              <label for="inputChecked">Checked</label>
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" id="inputChecked" >
                              <label for="inputChecked">Checked</label>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-md-9">
                              <button type="button" class="btn btn-primary">Save </button>
                              <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6"></div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection