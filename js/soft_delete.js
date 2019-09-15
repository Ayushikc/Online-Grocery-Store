
$(document).ready(function(){
    $("#delete").on("click",function(){
        var movietitle = $(this).val();
        var data = {
            'movietitle': movietitle
        };
        softDelete(data);
    });


});

function softDelete(data)
{
    $.ajax(
        {
            url: "DeleteMovieModel.php",
            datatype:"json",
            type:"POST",
            async: false,
            data:data,
            success: function(data){
                alert("Movie deleted succesfully");

            },
            error: function(data)
            {
                alert("Error in deleting the movie");
            }
        });
}

