@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Prizes</h3>
    </header>
    <div class="panel-body"> 
      <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


            <div class="row"><div class="col-sm-12">
                    <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >
                        <!--thead>
                            <tr>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                 <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                 <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                 <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                              
                        
                             
                              
                            </tr>
                        </thead-->
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
                        <tfoot>
                            <tr role="row">
                                <th>Prize Code</th>	
                                <th>Prize Name</th>	
                                <th>Cost</th>	
                                <th>Active</th>	
                            </tr>
                        </tfoot>
                    </table>
                </div></div>
            
            
              <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-7">
                    <!--div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        {{ $prizes->links() }}
                    </div-->
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection

