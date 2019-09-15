<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_SESSION["cart_products"])) //check session var
{
$total = 0; //set initial total value
$b = 0; //var for zebra stripe table 
$username = $_SESSION["username"];
foreach ($_SESSION["cart_products"] as $cart_itm)
{
	//set variables to use in content below
	$product_code = $cart_itm["product_code"];	
	$product_qty = $cart_itm["product_qty"];		
	$product_price = $cart_itm["product_price"];
		
		
	$subtotal = ($product_price * $product_qty); //calculate Price x Qty
	
   //$sql = "INSERT INTO orders(username,product_code,order_qnty,prod_amt) VALUES ('$username','$product_code','$product_qty','$subtotal')";
   //mysqli_query($mysqli,$sql);
   $sql = "SELECT id,product_qty from products where product_code = '$product_code';";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$inven_prod_qty=$row[product_qty];
	$product_id = $row[id];

	$sql2 = "SELECT id from users where username = '$username';";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	$user_id=$row2[id];


   mysqli_query($con,"INSERT INTO orders(user_id,product_id,order_qnty,prod_amt) VALUES ('$user_id','$product_id','$product_qty','$subtotal')");
	
	
	$updated_qnty = $inven_prod_qty - $product_qty;
	mysqli_query($con,"UPDATE products SET product_qty = '$updated_qnty' WHERE product_code = '$product_code'");
    }		

}

session_unset();
$_SESSION["username"] = $username;
header('Location:shopping.php');
?>

