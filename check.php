<?php
if(isset($_POST["username"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli("localhost","root","root","project");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $statement = $mysqli->prepare("SELECT `username` FROM `users` where `username`=?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        echo "already exists";
    }else{
       echo "";
    }
	$statement->close();
	$mysqli->close();
}

if(isset($_POST["email"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli("localhost","root","root","project");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT `email` FROM `users` where `email`=?");
	if($statement){
		$statement->bind_param('s', $email);
		$statement->execute();
		$statement->bind_result($email);
		if($statement->fetch()){
			echo "already exists";
		}
		else{
			echo "";
		}
		$statement->close();
	}
    //else
		//$statement->close();
	$mysqli->close();
}
?>