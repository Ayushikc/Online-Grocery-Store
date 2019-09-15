$( document ).ready(function() {

    $("#cartBtn").click(function(event){
        // retrive ur movie id to send to the cart page through POST/GET
        //  id from url
        // qty from input
        var url = window.location.href;
        
        var url_arr = url.split('?');
        var id_details = url_arr[1].split('=');
        var qty = $("#qty").val();
        var id = id_details[1];
        //var id =1;
        // if (qty=="0"){
        //     alert("The movie is not available !!"); 
        if(qty == null){
            alert("Currently movie is out of stock !!");
        }
        else {
            $.ajax({
                url: "add_to_cart_btn.php",
                type: "POST",
                data: { movieId: id, quantity: qty },
                success: function(data){
                    //alert("Back");
                   // alert(data);

                    if( data == "Not logged In"){
                        alert("Please login for continuing....");
                        window.location = "login.html";
                    }
                    else {
                        alert(data);
                    }
                    //alert(qty);
                    // alert("Updated");
                    // console.log("entered script");
                    // console.log(data);
                },
                error:function(err){
                    alert("Error");
                    // console.log(err);
                }   
            });
        }
    
    });

});

