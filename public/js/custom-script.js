/*
* Custom script
*/
$(document).ready(function(){
    $.fn.dataTable.ext.errMode = 'none';
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
    
    //toggle filter for machine list and report
    $('#filterBy').on('click', function(event) {        
        $('#filterDiv').toggle('show'); 
    });
       
    //filter table
    var table = $('#dashboard_sort').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel'],
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
    
    //Change export button label    
    $('.dt-button.buttons-excel span').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
    
    //search input in all tables
    $('#dashboard_sort_filter input').addClass('form-control');       
            
    //Display machine list from json query result
    //var base_url = 'http://localhost/coinoponlinebeta/public/';
    var base_url = 'https://www.ascentri.com/';
    var export_icon = 'https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png';
    
    
    var pathname = window.location.pathname; // Returns path only
    var parts = pathname.split('/');
    var currentID = parts.pop() || parts.pop();  // handle potential trailing slash
    
    
    //console.log(searchDate);
    $('#klogs').dataTable({
        ajax: base_url+'errorapi/'+currentID,    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        order: [[3,'desc']],
        columns:[{'data': 'id'},{'data': 'type'},{'data': 'error'},{'data': 'created_at'},{'data': 'status'}]
    }); 
    $('#winlogs').dataTable({
        ajax: base_url+'winapi/'+currentID,    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true, 
        order: [[3,'desc']],
        columns:[{'data': 'id'},{'data': 'testPlay'},{'data': 'winResult'},{'data': 'created_at'},{'data': 'totalWon'},{'data': 'playIndex'},{'data': 'owedWin'},
            {'data': 'excessWin'},{'data': 'stockLeft'},{'data': 'stockRemoved'},{'data': 'stockAdded'},{'data': 'nTimesOfPlay'},{'data': 'status'}]       
    });    
    $('#moneyapi').dataTable({   
        ajax: base_url+'moneyapi/'+currentID,
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,   
        order: [[1,'desc']],
        columns:[{'data': 'id'},{'data': 'created_at'},{'data': 'coinIn'},{'data': 'ttlCoinIn'},{'data': 'billIn'},{'data': 'ttlBillIn'},{'data': 'swipeIn'},{'data': 'type'},
            {'data': 'payment_result'},{'data': 'decline_reason'},{'data': 'payment_span'},{'data': 'ttlMoneyIn'},{'data': 'credits'},{'data': 'status'}]       
  
    });    
    $('#goalsapi').dataTable({
        ajax: base_url+'goalsapi/'+currentID,    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        order: [[3,'desc']],
        columns:[{'data': 'id'},{'data': 'testPlay'},{'data': 'pkPWM'},{'data': 'created_at'},{'data': 'pkVolt'},{'data': 'retPWM'},{'data': 'retVolt'},{'data': 'voltDecRetPercentage'},
            {'data': 'plusPickUp'},{'data': 'dropCount'},{'data': 'dropPWM'},{'data': 'dropVolt'},{'data': 'incVoltage'},{'data': 'decVoltage'},{'data': 'status'}]       
    });
    
    //excel button append
    $('#klogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#winlogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#moneyapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#goalsapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
      
    //Machine error report filter
    $("#m_model").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });   
    $("#m_type").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });   
    $("#e_msg").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });
    $("#site").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });    
    $("#max-date").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'machine-error-reports/'); form.submit(); });
    
    $("#m_model").select2();
    $("#m_type").select2();
    $("#e_msg").select2();
    $("#site").select2();
    
});
