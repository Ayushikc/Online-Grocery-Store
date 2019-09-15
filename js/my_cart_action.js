$(document).ready(function() {

   $("#myCart").click(function(){
        window.location = "cartPage.php";
    });   
    
    $("#order").click(function(){
        window.location = "orderHistory.php";
    }); 
    
    $('.btn-number').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var price = $("p[id='price"+fieldName+"']").text();
        var currentVal = parseInt(input.val());
        var totalPrice = "#tot"+fieldName;
        var qty_final = 0;
        var tot_final = 0;
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    $.ajax({  
                        type: 'POST',  
                        url: 'db_conn.php', 
                        data: { movieId: fieldName, quantity: parseInt(input.val())},
                        success: function(data){
                            // alert(price);
                            // alert(parseInt(input.val()));
                            $("#tot"+fieldName).text(price * parseInt(input.val()));

                            // $(this).find("#final_qty").each(function(){
                            //     qty_final = parseInt($(this)) +qty_final;
                               
                            // });
                            $(".input-number").each(function() {
                               qty_final = parseInt($(this).val())+ parseInt(qty_final);
                            //    alert(qty_final); // 
                            });
                            $("#final_qty").text(qty_final);

                            $(".tot_val").each(function() {
                                tot_final = parseInt($(this).text())+ parseInt(tot_final);
                                // alert(tot_final); // 
                             });
                            $("#amt").text(tot_final);
                         
                            // alert ("hi");
                            // alert("Data Updated and tot");
                            //alert(data);
                        },
        
                        error:function(err){
                            alert(err);
                    }   
                });
    
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }
            $(this).attr('disabled', false); 
        }
        else if(type == 'plus') {
                tot_final = 0;
                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                $.ajax({  
                    type: 'POST',  
                    url: 'db_conn.php', 
                    data: { movieId: fieldName, quantity: currentVal+1 },
                    success: function(data){
                        $("#tot"+fieldName).text(price * parseInt(input.val()));
                        $(".input-number").each(function() {
                            qty_final = parseInt($(this).val()) + parseInt(qty_final);
                            // alert(qty_final); // 
                         });
                         
                         $("#final_qty").text(qty_final);

                         $(".tot_val").each(function() {
                            tot_final = parseInt($(this).text()) + parseInt(tot_final);
                             // 
                         });
                         $("#amt").text(tot_final);

                        // alert("Data Updated and tot");
                        // alert("Data Updated");
                        // alert(data);
                    },
                    error:function(err){
                        alert(err);
                        location.reload();
                    }  
                });

            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }	
        } else {
            input.val(0);
        }
    }
    });

    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    
    $('.input-number').change(function() {
        name = $(this).attr('name');
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        
        // alert("Hi");
        // alert(minValue + "," + maxValue + "," + valueCurrent);
        
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled');
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });

    $(".input-number").focusout(function (e) {
        var fieldName = $(this).attr('name');
        var input = $("input[name='"+fieldName+"']");
        var price = $("p[id='price"+fieldName+"']").text();
        var currentVal = parseInt(input.val());
        
        if (currentVal<= maxValue && currentVal>= minValue){
            $.ajax({
                type: 'POST',  
                url: 'db_conn.php', 
                data: { movieId: fieldName, quantity: currentVal},
                success: function(data){
                    // alert(price);
                    // alert(parseInt(input.val()));
                    $("#tot"+fieldName).text(price * currentVal);
                    $(".input-number").each(function() {
                        qty_final = parseInt($(this).val())+ parseInt(qty_final);
                        // alert(qty_final); // 
                     });
                     $("#final_qty").text(qty_final);
                     
                     $(".tot_val").each(function() {
                        tot_final = parseInt($(this).text())+ parseInt(tot_final);
                        // alert(tot_final); // 
                     });
                     $("#amt").text(tot_final);
                    // alert("Data Updated and tot");


                    //alert(data);
                },
                error:function(err){
                    alert(err);
                }   
            });
        }
    });

    $('.btn-danger').click(function(){
        fieldName = $(this).attr('data-field');
        $.ajax({  
            type: 'POST',  
            url: 'db_conn_del.php', 
            data: { movieId: fieldName },
            success: function(data){
                alert("Item deleted successfully");
               // location.reload();
                window.location.href='cartPage.php';            },

            error:function(err){
                alert(err);
        }   
        });

    });


});