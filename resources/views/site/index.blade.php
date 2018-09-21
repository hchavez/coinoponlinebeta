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
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="siteDivtable" role="grid" aria-describedby="exampleTableSearch_info" >
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
                            
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div></div>
            
        </div>
    </div>
</div>
<style>
.select2-container{ width: 100% !important; }
</style>
<script>
$(document).ready(function() {
    //Filter customization 
    var origin   = window.location.origin;   // Returns base URL   
    if(origin=='http://localhost' || origin=='::1' || origin=="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/site_api';
    }else{
        var url = 'https://www.ascentri.com/site_api';
    }
    setTimeout(function(){
        $('.table select').each(function(i) {
            var label = ['Route', 'Area', 'SiteType', 'SiteGroup', 'State', 'Site','Street','Suburb','City'];
            $(this).attr('id', 'filter'+(i+1));        
            $("#filter" + (i+1)).select2({
                placeholder: label[i]
            });        
        });
      }, 2000);
    
    $('#siteDivtable').dataTable({     
        pageLength: 20,
        ajax: url,    
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: '',
            filename: 'sites',
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                var lastCol = sheet.getElementsByTagName('col').length - 1;
                var colRange = createCellPos( lastCol ) + '1';                
                var afSerializer = new XMLSerializer();
                var xmlString = afSerializer.serializeToString(sheet);
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                var filterAttr = xmlDoc.createAttribute('ref');
                filterAttr.value = 'A1:' + colRange;
                xlsxFilter.setAttributeNode(filterAttr);
                sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                $('row c', sheet).attr( 's', '51' );
            }
        }],
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
        },
        deferRender:    true,       
        order: [[1,'desc']],
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'route_name'},{'data': 'area'},{'data': 'site_type'},{'data': 'site_group'},{'data': 'state'},{'data': 'site_name'},{'data': 'street'},{'data': 'suburb'},{'data': 'city'}]
    });
           
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
   
});
</script>

@endsection

