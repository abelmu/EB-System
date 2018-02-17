$(document).ready(function(){
    $('#search').keyup(function(){
    	var query=$(this).val();
    	if (query=='') {
    		location.reload();
    	}
		$.get('/search/' + query,function(data,status){
		$('tbody').html(data);
		});
    });


});