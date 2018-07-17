@extends('layouts.app-left-admin-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Product Lists</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                <a class="btn btn-primary" href="{{ route('product-lists.create') }}">Add New Theme</a></label></div>
                        </div>
                        
                    </div>

                    <div class="row"><div class="col-sm-12">
<!--                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>-->
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                     <thead>
                            <tr role="row">
                                <th>Product Name</th>	
                                <th>Product Code</th>	
                                <th>Active</th>
                        </thead>
                                <tbody>

                                     @foreach ($productlists as $product)
                            <tr role="row">
                                <td> {{ $product->product_name  }} </td>
                                <td> {{ $product->product_code  }} </td>
                                <?php if($product->active == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>

                            </tr>
                            @endforeach
                                </tbody>
                                <tfoot>
                                    
                                    
                            <tr role="row">
                                <th>Product Name</th>	
                                <th>Product Code</th>	
                                <th>Active</th>
                      
                                </tfoot>
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

