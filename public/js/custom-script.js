/*
* Custom script
*/
$(document).ready(function(){

    var machine_details = ['state', 'type', 'model', 'serial', 'site', 'route', 'area'];
    $.each(machine_details, function(num, val){        
        $("#machine_" + val).select2(); //Dropdown autosuggest
        $("#machine_" + val).on('change', function(e){  $('form#filter_table').submit();  }); //Auto submit filter
    });  

    //Date picker
    $("#txtToDate").datepicker();
    $("#txtFromDate").datepicker(); 
    $("#min-date").datepicker();
    $("#max-date").datepicker();
   
    $('#filterBy').on('click', function(event) {        
        $('#filterDiv').toggle('show'); //toggle filter 
    });
      
    //filter table
    var table = $('#dashboard_sort').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'           
        ],
        scrollY: '450px',
        paging: true,
        autoFill: true,     
        pageLength: 100,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( '#filterDiv' )
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
                });
            } );
        }
    } );    
    
    //Click whole row
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });    
    
    //Filter customization
    $('#filterDiv select').each(function(i) {
        $(this).attr('id', 'filter'+(i+1));
        $("#filter" + (i+1)).select2();         
    });          
      
    $('#dashboard_sort thead th div').each(function(i, val) {        
        var label = $(this).html(); 
        $('#select2-chosen-'+ (i+1)).html(label);
    });
    
    var re = new RegExp(/^.*\//);
    var baseUrl = re.exec(window.location.href);    
    $('.dt-button.buttons-excel span').html('<img src="'+baseUrl+'assets/images/excel.png" width="32px">'); //Change export button label
    $('#dashboard_sort_filter input').addClass('form-control'); //search input in all tables      
     
    
});
