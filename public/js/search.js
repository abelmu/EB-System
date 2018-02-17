$(document).ready(function() {

     var query=$('#query').val();
     $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               
            })
        $('#query').keyup(function() {
            var query=$(this).val();
           console.log(query);

           $.ajax({
type:'POST',
url:'/search',
data:query,
success:function(response){
$('tbody').html(response);
},
 error: function(response){
  console.log(response);  
 }
//
});


        });
    });