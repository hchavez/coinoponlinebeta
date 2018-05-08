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
    
    //orderBy date
    var url = window.location.href;    
    var sortColumn;
    
    if( url.indexOf('reports') >- 1 ){
        sortColumn = [19, 'DESC'];
    }else if( url.indexOf('error') >- 1 ){
        sortColumn = [1, 'DESC'];
    }else if( url.indexOf('win') >- 1 || url.indexOf('goals') >- 1){
        sortColumn = [2, 'DESC'];
    }else{}
      
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
    $('.dt-button.buttons-excel span').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); //Change export button label
    $('#dashboard_sort_filter input').addClass('form-control'); //search input in all tables      
     
    //Show filter indicator on mouse hover
    $(".table th").each(function() {

        $(this).hover(
          function() {
            $(this).append('<i class="wb-sort-vertical"></i>');
          }, function() {
            $(".wb-sort-vertical").css('display','none');
          }
        );
    });
    
    
    //test filter    
    /*var check = setInterval(function(){ 
        if( $('#filterDate').length > 0 ){
            alert('olah');
            clearInterval(check);
        }
    }, 500);	*/   
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {            
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var age = parseFloat( data[0] ) || 0; // use data for the age column
            //console.log('year:'+ age + ' = min:'+min+ ' = max:' + max);
            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && age <= max ) ||
                ( min <= age   && isNaN( max ) ) ||
                ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );

    $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    //var table = $('#dashboard_sort').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change(function () {
        table.draw();
    });
    
    
    //test start
    $('#dashboard_sort tbody tr td:eq(1)').each(function(index){
        var val = $(this).text().split(' ');
        
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();

        var today = ((''+day).length<2 ? '0' : '') + day + '/' + ((''+month).length<2 ? '0' : '') + month  + '/' + d.getFullYear();
        
        console.log(val[0] + '-' + today);
        if(val[0] === today){
            console.log('Hooray!');
        }
    });

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    console.log(baseUrl+'/public/errorapi');
    $('#klogs').dataTable({
        ajax: 'https://www.ascentri.com/errorapi',    
        dom: 'Bfrtip',
            buttons: [
                'excel'           
            ],
        deferRender:    true,       
        columns:[
            {'data': 'id'},
            {'data': 'type'},
            {'data': 'error'},
            {'data': 'created_at'},
            {'data': 'status'}
        ]       
    });    
   
    $('#winlogs').dataTable({
        ajax: 'https://www.ascentri.com/winapi',    
        dom: 'Bfrtip',
            buttons: [
                'excel'           
            ],
        deferRender:    true,       
        columns:[
            {'data': 'id'},
            {'data': 'testPlay'},
            {'data': 'winResult'},
            {'data': 'created_at'},
            {'data': 'totalWon'},
            {'data': 'playIndex'},
            {'data': 'owedWin'},
            {'data': 'excessWin'},
            {'data': 'stockLeft'},
            {'data': 'stockRemoved'},
            {'data': 'stockAdded'},
            {'data': 'nTimesOfPlay'},
            {'data': 'status'}            
        ]       
    });
    
    $('#moneyapi').dataTable({
        ajax: 'https://www.ascentri.com/moneyapi',    
        dom: 'Bfrtip',
            buttons: [
                'excel'           
            ],
        deferRender:    true,       
        columns:[
            {'data': 'id'},
            {'data': 'created_at'},
            {'data': 'coinIn'},
            {'data': 'ttlCoinIn'},
            {'data': 'billIn'},
            {'data': 'ttlBillIn'},
            {'data': 'swipeIn'},
            {'data': 'type'},
            {'data': 'payment_result'},
            {'data': 'decline_reason'},
            {'data': 'ttlMoneyIn'},
            {'data': 'forPlay'},
            {'data': 'forClick'},
            {'data': 'pricePlay'},
            {'data': 'credits'},
            {'data': 'status'}
        ]       
    });
    
    $('#goalsapi').dataTable({
        ajax: 'https://www.ascentri.com/goalsapi',    
        dom: 'Bfrtip',
            buttons: [
                'excel'           
            ],
        deferRender:    true,       
        columns:[
            {'data': 'id'},
            {'data': 'testPlay'},
            {'data': 'pkPWM'},
            {'data': 'created_at'},
            {'data': 'pkVolt'},
            {'data': 'retPWM'},
            {'data': 'retVolt'},
            {'data': 'voltDecRetPercentage'},
            {'data': 'plusPickUp'},
            {'data': 'dropCount'},
            {'data': 'dropPWM'},
            {'data': 'dropVolt'},
            {'data': 'incVoltage'},
            {'data': 'decVoltage'},
            {'data': 'status'}
        ]       
    });
    
    $('#klogs_wrapper button').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
    $('#winlogs_wrapper button').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
    $('#moneyapi_wrapper button').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
    $('#goalsapi_wrapper button').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
  
    
});
