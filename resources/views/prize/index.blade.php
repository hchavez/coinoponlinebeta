@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Prizes</h3>
    </header>
    <div class="panel-body"> 
      <div id="prize_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div>
                <div class="col-sm-12">
                    <div id="filterDiv" class="machine-custom-width"><br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >
                       
                        <thead>
                            <tr role="row">
                                <th>Prize Code</th>	
                                <th>Prize Name</th>	
                                <th>Cost</th>	
                                <th>Active</th>	
                        </thead>
                        <tbody>
                            @foreach ($prizes as $prize)
                            <tr role="row">
                                <td> {{ $prize->prize_code  }} </td>
                                <td> {{ $prize->prize_name  }} </td>
                                <td> {{ $prize->cost  }}</td>
                                <?php if($prize->active == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>
                              
                          
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div></div>    
            
        </div>
    </div>
</div>
@endsection

