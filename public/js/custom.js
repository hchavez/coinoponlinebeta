
// A $( document ).ready() block.
$( document ).ready(function() {
    
    var base_urllink = window.location.origin;

    if (base_urllink == "http://localhost"){
         var base_url = "http://localhost/coinoponlinebeta/public/machine-management/ajax_getmachinemodel/";
       }else{
        var base_url = "https://www.ascentri.com/machine-management/ajax_getmachinemodel/";
    }
    
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $('select[name="machine_type"]').on('change', function() {
            var machinetype_id = $(this).val();
           
            if(machinetype_id) {
                $.ajax({
                    url: base_url+machinetype_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                     

                        $('select[name="machine_model"]').empty();
                        $.each(data, function(key, value) {
           
                            $('select[name="machine_model"]').append('<option value="'+ value.id +'">'+ value.machine_model +'</option>');
                        });

                       
                    }
                });
            }else{
                $('select[name="machine_model"]').empty();
            }
        });
   
   
});


