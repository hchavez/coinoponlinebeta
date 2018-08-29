@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Area Listing</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">                    
                    <div class="row">
                        <div class="col-sm-12">                           
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Area</th>
                                        <th>Area Manager</th>
                                        <th>Regional Manager</th>
                                        <th>Franchise Area</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($area as $area)                                    
                                    <tr role="row" class="odd">
                                        <td>{{ $area->area }}</td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" <?php echo ($area->franchise_area == '1')? 'checked': ''; ?> readonly></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        
        <div class="panel">
            
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">  
                    <form method="get">
                        <div class="row">
                            <div class="form-group col-md-3">
                              <label class="form-control-label" for="inputBasicFirstName">Area</label>
                              <input type="text" class="form-control" id="inputBasicFirstName" name="inputFirstName" placeholder="Area" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                              <label class="form-control-label" for="inputBasicFirstName">Area Manager</label>
                                <select class="form-control" name="area_manager">
                                    <option>---Select Area Manager---</option>
                                    @foreach ($mng_agents as $agent) 
                                    <option>{{ $agent->managing_agent }}</option>                                
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label class="form-control-label" for="inputBasicFirstName">Regional Manager</label>
                                <select class="form-control" name="regional_manager">
                                    <option>---Select Regional Manager---</option>                               
                                </select>
                            </div>
                            <div class="col-sm-2">                           
                                <label class="form-control-label" for="inputBasicFirstName"></label>
                                <div class="checkbox-custom checkbox-primary" style="padding-top: 15px;">
                                    <input type="checkbox" id="inputChecked" checked="">
                                    <label for="inputChecked">Regional Manager</label>
                                </div>
                            </div>
                            <div class="col-sm-1" style="padding-top: 40px;">                           
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection