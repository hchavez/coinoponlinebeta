@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Sites</h3>
    </header>
    <div class="panel-body">
        <div id="site_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
               
                <!--div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div-->
                    
                <div class="col-sm-12">                    
                    <button type="button" id="clearFilter" class="btn btn-danger"  value="0" style="vertical-align: bottom;">Clear Filter</button>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="siteDiv" role="grid" aria-describedby="exampleTableSearch_info" >
                        <thead>
                            <tr role="row" style="border-top: 1px solid #e4eaec;">
                                <th>Route</th>	
                                <th>Area</th>	
                                <th>SiteType</th>	
                                <th>SiteGroup</th>	
                                <th>State</th>	
                                <th>Site</th>
                                <th>Street</th>
                                <th>Suburb</th>
                                <th>City</th>
                            </tr>                            
                        </thead>
                        <tbody>                           
                            
                            @foreach ($sites as $site)
                            <tr role="row">
                                <td> {{ $site->route_name  }} </td>
                                <td> {{ $site->area  }} </td>
                                <td> {{ $site->site_type  }}</td>
                                <td> {{ $site->site_group  }} </td>
                                <td> {{ $site->state }} </td>
                                <td> {{ $site->site_name }} </td>
                                <td> {{ $site->street }} </td>
                                <td> {{ $site->suburb }} </td>   
                                <td> {{ $site->city }} </td>                          
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div></div>
            
        </div>
    </div>
</div>
<style>
.select2-container{width:100% !important;}
.select2-container .select2-choice > .select2-chosen{color:#333 !important;}
</style>
<script>
$(document).ready(function() {
    $('#siteDiv').DataTable( {
        pageLength: 20,
        dom: 'Bfrtip',
        buttons: ['excelHtml5'],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });
    
    //Filter customization   
    $('#siteDiv select').each(function(i) {
        var label = ['Route', 'Area', 'SiteType', 'SiteGroup', 'State', 'Site','Street','Suburb','City'];
        $(this).attr('id', 'filter'+(i+1));        
        $("#filter" + (i+1)).select2({
            placeholder: label[i]
        });        
    });  
    
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
   
});
</script>

@endsection

