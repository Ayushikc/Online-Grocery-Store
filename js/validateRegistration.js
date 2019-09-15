$(document).ready(function() {
    $('#button').hide();
	
	$("#username").after("<span id=\"userspan\" class=\"redbold\"> </span>");
	$("#email").after("<span id=\"emailspan\" class=\"redbold\"> </span>");
	$("#country").after("<span id=\"countryspan\" class=\"redbold\"> </span>");
	$("#phone").after("<span id=\"phonespan\" class=\"redbold\"> </span>");
	$("#usertype").after("<span id=\"usertypespan\" class=\"redbold\">  </span>");
    
	var x_timer;
	var userflag,userflag1,userflag2;//flags for username
	var emailflag,emailflag1,emailflag2;//flags for email
	var passwordflag,passwordflag1,passwordflag2,passwordflag3,passwordflag4,passwordflag5; //flags for password
	var totalflag;
	var countryflag, countryflag1, countryflag2;
	var phoneflag, phoneflag1, phoneflag2;
	var usertypeflag;
	var alphaReg = /^\s*[a-zA-Z,\s]+\s*$/;
    var phoneno = /^\d{10}$/;
    var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
	userflag=0;userflag1=0;userflag2 = 0;
	emailflag=0;emailflag1=0;emailflag2 = 0;
	passwordflag=0;passwordflag1=0;passwordflag2=0;passwordflag3=0;passwordflag4=0; passwordflag5 = 0;
	countryflag =0;countryflag1 =0;countryflag2 =0;
	totalflag = 0;
	phoneflag = 0;
    usertypeflag =0;

var u=0;
    //username validation 2
    $( "#username" ).focus(function() {
        $("#userspan").show();
        $("#userspan").text("Please enter the Username containing only alphabetical characters.");
    });

    $( "#username" ).blur(function() {
        var inputVal = $(this).val();
        if(inputVal.length < 1)
        {
            $("#userspan").show();
            $("#userspan").text("username cannot be empty");
            userflag1 = 0;
        }
        else{
            userflag1 = 1;
        }
        if(!alphaReg.test(inputVal)) {
            userflag2=0;
            $("#userspan").show();
            $("#userspan").text("error must contain only alphabetical characters");
        }
        else{

            userflag2=1;
        }

        userflag = userflag1 + userflag2;
        if(userflag !==2)
        {
            $("#userspan").show();
            $("#userspan").text("invalid User name");
        }
        else{
            $("#userspan").hide();
        }
        //total flags check
        totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag + usertypeflag ;

        // if(totalflag!==14)
        // {
        //     $('#button').hide();
        // }
        // else{
        //     $('#button').show();
        // }
    });

    //check if the username already exists
    $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            checkNetidExists(user_name);
        }, 1000);
    });
    function checkNetidExists(username){
        $.post('check.php', {'username':username}, function(data) {
            $("#user-result").html(data);
            u =  1;
        });

    }


    //country validation 2
    $( "#country" ).focus(function() {
        $("#countryspan").show();
        $("#countryspan").text("Please enter the name of the country containing only alphabetical characters.");
    });

    $( "#country" ).blur(function() {
        var inputVal = $(this).val();
        if(inputVal.length < 1 )
        {
            $("#countryspan").show();
            $("#countryspan").text("Country cannot be empty");
            countryflag1 = 0;
        }
        else{
            countryflag1 = 1;
        }
        if(!alphaReg.test(inputVal)) {
            countryflag2=0;
            $("#countryspan").show();
            $("#countryspan").text("error must contain only alphabetical characters");
        }
        else{
            countryflag2=1;
        }

        countryflag = countryflag1 + countryflag2;
        if(countryflag!==2)
        {
            $("#countryspan").show();
            $("#countryspan").text("invalid country");
        }
        else{
            $("#countryspan").hide();
        }
        //total flags check
        totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag + usertypeflag ;

        // if(totalflag!==14)
        // {
        //     $('#button').hide();
        // }
        // else{
        //     $('#button').show();
        // }
    });

    //User Type validation
    $( "#usertype" ).focus(function() {
        $("#usertypespan").show();
        $("#usertypespan").text("Please select the user type.");
    });

    $( "#usertype" ).blur(function() {
        var inputVal = $(this).val();
        if(inputVal.length < 1)
        {
            $("#usertypespan").show();
            $("#usertypespan").text("User Type cannot be empty");
            usertypeflag = 0;
        }
        else{
            usertypeflag = 1;
        }

        if(usertypeflag === 0)
        {
            $("#usertypespan").show();
            $("#usertypespan").text("Please choose the user type");
        }
        else{
            $("#usertypespan").hide();
        }
        //total flags check
        totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag +usertypeflag;

        // if(totalflag!==14)
        // {
        //     $('#button').hide();
        // }
        // else{
        //     $('#button').show();
        // }
    });

    //Phone number validation
    $( "#phone" ).focus(function() {
        $("#phonespan").show();
        $("#phonespan").text("Please enter the phone number.");
    });

    $( "#phone" ).blur(function() {
        var inputVal = $(this).val();
        if(inputVal.length <1)
        {
            $("#phonespan").show();
            $("#phonespan").text("Phone number cannot be empty");
            phoneflag1 = 0;
        }
        else{
            phoneflag1 = 1;
        }

        if(!phoneno.test(inputVal)) {
            phoneflag2=0;
            $("#phonespan").show();
            $("#phonespan").text("error must contain only 10 digits");
        }
        else{
            phoneflag2=1;
        }
        phoneflag = phoneflag1 + phoneflag2;
        if(phoneflag !== 2)
        {
            $("#phonespan").show();
            $("#phonespan").text("invalid Phone number");
        }
        else{
            $("#phonespan").hide();
        }
        //total flags check
        totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag +usertypeflag;

        // if(totalflag!==14)
        // {
        //     $('#button').hide();
        // }
        // else{
        //     $('#button').show();
        // }
    });

//password validation checks 5

$('input[type=password]').keyup(function() {
	var pswd = $(this).val();
	if ( pswd.length < 8 ) {
		$('#length').removeClass('valid').addClass('invalid');
		passwordflag=0;
	} 
	else {
		$('#length').removeClass('invalid').addClass('valid');
		passwordflag = 1;
	}
	
//validate letter
if ( pswd.match(/[a-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
	passwordflag1=1;
} else {
    $('#letter').removeClass('valid').addClass('invalid');
	passwordflag1=0;
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
	passwordflag2=1;
} else {
    $('#capital').removeClass('valid').addClass('invalid');
	passwordflag2=0;
}
//validate characters
if ( pswd.match(/[_\-!\"@;,.:]/) ) {
    $('#character').removeClass('invalid').addClass('valid');
	passwordflag3=1;
} else {
    $('#character').removeClass('valid').addClass('invalid');
	passwordflag3=0;
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
	passwordflag4=1;
} else {
    $('#number').removeClass('valid').addClass('invalid');
	passwordflag4=0;
}

passwordflag5 = passwordflag+passwordflag1+passwordflag2+passwordflag3+passwordflag4;

//total flags check
    totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag +usertypeflag;
		if(totalflag!==14)
		{
			$('#button').hide();
		}
		else{
			$('#button').show();
		}
}).focus(function() {
    $('#pswd_info').show();
	
}).blur(function() {
	if(passwordflag5!==5){
		alert("password doesn't meet requirements");
	}
    $('#pswd_info').hide();
	
});

//email valildation 2
$("#email").focus(function() {
	    $("#emailspan").show();
		$("#emailspan").text("Please enter valid email id containing a @ character.");
	});
	
	$("#email").blur(function(){
		var email=$(this).val();
		if(email.length===0){
			$("#emailspan").show();
			$("#emailspan").text("email cannot be empty");
				emailflag1=0;
		}
		else{
			emailflag1=1;
		}
        if(!emailReg.test(email)) {
            emailflag2=0;
            $("#emailspan").show();
            $("#emailspan").text("error no @ present or .com");
        } else {
		    emailflag2 = 1;
        }
		emailflag = emailflag1 + emailflag2;
		if(emailflag!==2)
		{
			$("#emailspan").show();
			$("#emailspan").text("invalid email");
		}
		else{
			$("#emailspan").hide();
		}
		
		//total flags check
        totalflag = userflag + emailflag + passwordflag5 + countryflag + phoneflag +usertypeflag;
		 
		// if(totalflag!==14)
		// {
		// 	$('#button').hide();
		// }
		// else{
		// 	$('#button').show();
		// }
	});

	
var y_timer;    
    $("#email").keyup(function (e){
        clearTimeout(y_timer);
        var email_check = $(this).val();
        y_timer = setTimeout(function(){
            checkEmailExists(email_check);
        }, 1000);

    }); 

function checkEmailExists(email){
    $.post('check.php', {'email':email}, function(data,status) {
        if (status === "already exists" || totalflag!==14 || u===1) {
        $("#email-result").html(data);
        $('#button').hide();}
        else {
            $('#button').show();
        }

    });
}



});
