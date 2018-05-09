@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Themes</h3>
    </header>
    <div class="panel-body"> 
       <div id="theme_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


            <div class="row"><div class="col-sm-12">
                    <div id="filterDiv">Filter by: <br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >
                        
                        <thead>
                            <tr role="row">
                                <th>Prize Code</th>	
                                <th>Theme</th>	
                                <th>Cost</th>	
                                <th>PrizeSetting</th>	
                                <th>Min Exp $perwin</th>	
                                <th>Max Exp $perwin</th>
                                <th>Active</th>
                                
                        </thead>
                           <tbody>
                            @foreach ($themes as $theme)
                            <tr role="row">
                                <td> {{ $theme->product_code  }} </td>
                                <td> {{ $theme->theme  }} </td>
                                <td> {{ $theme->cost  }}</td>
                                <td> {{ $theme->prize_setting  }}</td>
                                <td> {{ $theme->min_expected_doll_per_win  }}</td>
                                <td> {{ $theme->max_expected_doll_per_win  }}</td>
                                <?php if($theme->active == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>

                            </tr>
                            @endforeach
                        </tbody>
                        
                        <tfoot>
                            <tr role="row">
                                <th>Prize Code</th>	
                                <th>Theme</th>	
                                <th>Cost</th>	
                                <th>PrizeSetting</th>	
                                <th>Min Exp $perwin</th>	
                                <th>Max Exp $perwin</th>
                                <th>Active</th>
                                
                        </tfoot>
                    
                    </table>
                </div></div>
            
            
              <div class="row">
               
               
            </div>
            
            
        </div>
    </div>
</div>
@endsection

