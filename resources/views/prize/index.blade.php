@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Prizes</h3>
    </header>
    <div class="panel-body"> 
      <div id="prize_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <!--div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div-->
                <div class="col-sm-12">
                    <button type="button" id="clearFilter" class="btn btn-danger"  value="0" style="vertical-align: bottom;">Clear Filter</button>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="prizeDiv" role="grid" aria-describedby="exampleTableSearch_info" >
                       
                        <thead>
                            <tr role="row"  style="border-top: 1px solid #e4eaec;">
                                <th>Prize Code</th>	
                                <th>Prize Name</th>	
                                <th>Cost</th>	
                                <th>Active</th>	
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
.select2-container{width:100% !important;}
</style>
<script>
$(document).ready(function() {
    //Filter customization 
    var origin   = window.location.origin;   // Returns base URL   
    if(origin=='http://localhost' || origin=='::1' || origin=="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/prize_api';
    }else{
        var url = 'https://www.ascentri.com/prize_api';
    }
    setTimeout(function(){
        $('.table select').each(function(i) {
            var label = ['Prize Code', 'Prize Name', 'Cost', 'active'];
            $(this).attr('id', 'filter'+(i+1));        
            $("#filter" + (i+1)).select2({
                placeholder: label[i]
            });        
        });
        
        $( '.table tbody tr td:nth-child(4)' ).each(function( index ) {  
            var current = $(this).html();
            if(current=='0'){ $(this).html('NO'); }
            else{ $(this).html('YES'); }
        });        
        
      }, 2000);
    
    $('#prizeDiv').dataTable({     
        pageLength: 20,
        ajax: url,    
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: '',
            filename: 'prize',
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
        columns:[{'data': 'prize_code'},{'data': 'prize_name'},{'data': 'cost'},{'data': 'active'}]
    });
           
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
   
});
</script>

@endsection

