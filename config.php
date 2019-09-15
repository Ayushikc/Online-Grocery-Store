<?php
$currency = '&#36; '; //Currency Character or code

$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );						
//connect to MySql						
$mysqli = mysqli_connect($servername, $username, $password, $database);
						
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>