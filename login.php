<?php
session_start();
function text_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$email= text_input($_POST["emailid"]);
$password= text_input($_POST['password']);
//$_SESSION["sess_username"]=$username;
//$_SESSION["sess_password"]=$password;
//$db = 'project';

$mysqli=new mysqli("localhost","root","root",'project');
if ($mysqli->connect_error){
        die('Could not connect to database!');
}
$query="SELECT * FROM users WHERE email='".$email."'";
//$query = 'SELECT * FROM `users` WHERE `email`="'.$email.'"' ;
$result=mysqli_query($mysqli,$query);

if(!$result)
{
	header('Location:index.html');
	exit();
}

else{

	 $userDetails = mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $name= $userDetails['username'];
     $_SESSION["username"]=$name;
     //echo $name;
     $hash = $userDetails['password'];
     $hash = substr( $hash, 0, 60 );
	 if(password_verify($password, $hash))
	 {
        if($name=='admin'){
    header("Location: admin.php");
    }
    else
    header("Location: shopping.php");
	 }
	 else
	 {
         echo "<script> alert('Error in Login'); 
         window.location.href = 'index.html';
         </script>";
         //header('Location:login.html');
         exit();
	 }
}

?>

