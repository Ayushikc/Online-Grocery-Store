$(document).ready(function() {
	$('.btn-primary').click(function(){
		// alert("Order has been Cancelled");
	        fieldName = $(this).attr('data-field');
	        $.ajax({  
	            type: 'POST',  
	            url: 'cancellation.php', 
	            data: { orderId: fieldName },
	            success: function(data){
	                alert("Order Cancelled Successfully");
	                location.reload();
	            },
	            // alert(data);
	            error:function(err){
	                alert(err);
	        }   
	    });

	    });

});