/*
* Custom script
*/
var url_string = window.location.href;
var url = new URL(url_string);
var param = url.searchParams.get('page');
var pathArray = window.location.pathname.split( '/' );

if(param!==null){ url_param = '?page='+param; }else{ url_param = ''; }
if(window.location.hostname === 'localhost'){
    var json_url='http://localhost/coinoponlinebeta/public/machine-management/get'+ucFirst(pathArray['4'])+'/'+pathArray['5']+url_param+'&pg='+pathArray['4'];    
}else{
    var json_url='https://www.ascentri.com/machine-management/getError/'+ucFirst(pathArray['3'])+'/'+pathArray['4']+url_param+'&pg='+pathArray['3'];       
}
showProducts(json_url, pathArray['4']);
function ucFirst(string) 
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function showProducts(json_url,logs){
    
    $.getJSON(json_url, function(data){
        console.log('TEST',data);  
        var tableData;
        
        if(logs == 'error'){
            var bailey = $.each(data.data,function(i) {   
                $('#json_table tbody').append('<tr role="row"><td class="sorting_1">'+data.data[i].id+'</td><td>'+
                    data.data[i].type+'</td><td>'+
                    data.data[i].error+'</td><td>'+
                    data.data[i].created_at+'</td><td>'+
                    data.data[i].status+'</td></tr>'
                );            
            });
        }
        if(logs == 'money'){
            $.each(data.data,function(i) {   
                $('#json_table tbody').append('<tr role="row"><td class="sorting_1">'+data.data[i].id+'</td><td>'+
                    data.data[i].created_at+'</td><td>'+
                    data.data[i].coinIn+'</td><td>'+
                    data.data[i].ttlCoinIn+'</td><td>'+
                    data.data[i].billIn+'</td><td>' +
                    data.data[i].ttlBillIn+'</td><td>' +
                    data.data[i].swipeIn+'</td><td>' +
                    data.data[i].type+'</td><td>' +
                    data.data[i].payment_result+'</td><td>' +
                    data.data[i].decline_reason+'</td><td>' +
                    data.data[i].ttlMoneyIn+'</td><td>' +
                    data.data[i].forPlay+'</td><td>' +
                    data.data[i].forClick+'</td><td>' +
                    data.data[i].pricePlay+'</td><td>' +
                    data.data[i].credits+'</td><td>' +                   
                    data.data[i].status+'</td></tr>'                     
                );            
            });
        }             
        
        var loop;
        //var nextPage = new URL(data.next_page_url);
        //var nextParam = url.searchParams.get('page');
        console.log(window.location.hostname);

          
       // var totalPages  = data.total;
        var currentPage = 1;   
        
        $(".pagination").pagy({
                totalPages: data.last_page,
                currentPage: currentPage
        });
        
        $('#pagination_links ul li').each(function(index){
            var val = $(this).text();
            //$(this).attr('href','?page='+index);
            $(this).on('click',function(){  
                window.location.href = url_string + '?page=' + index;
            });
        });
       
               
    });
    
}

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
        order: [[1, 'DESC']],
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

    
    
    
});
