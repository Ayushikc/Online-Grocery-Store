$(document).ready(function() {

    $("#buy_btn").click(function(){
        var userid_det=$("#buy_btn").val();
       // alert(userid_det);
        $.ajax({
            url: "buy_btn.php",
            type: "POST",
            data: {userid: userid_det},
           
            success: function(data, message){
                //alert(data);
                if (data =="1"){
                    alert("Order Placed Successfully");
                    window.location = "orderHistory.php";
                }
                else if(data =="Please select items to buy !!"){
                    window.location = "home.php";
                }
                else{
                    alert("Quantity selected is more !!");
                }


            },
            error:function(err){
                alert("Error");
                // console.log(err);
            }   
        });
    });     
}); 