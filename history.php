<?php
session_start();
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>History | Online Grocery Shopping</title>
	<link rel="icon" href="favi.png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar2.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">

	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		
		#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 62px;
			float: left;	
			position: fixed;		
		}
		td{
			padding: 5px;
		}

		th{
			padding: 5px;
			font-size: 20px;
			text-align: center;
		}
		body{
	background-image: url("back.jpg");
	background-attachment: fixed;
	background-size: cover;
	color: white;	
}


	</style>
	
</head>

<body>

<div id="logo">
		<a href="shopping.php">
		<img src="imgs/logo.png" width="100%">
	</a>
</div>

<div id="sidebar" >
	<ul>
		<li >Welcome <?php echo $_SESSION['username'];?></li>
				
		<li>
			<a href="destroy.php"> 
			<table><tr><td><img src="imgs/icons/logout2.png" /></td>
			<td >&nbsp;Logout</td></tr></table></a>
		</li>

		<li>&nbsp;</li>
		
	</ul>
</div>


<!--CONTENT-->

<div class="content">
	<section class="container">

<?php
if(isset($_SESSION['username'])){
	$username = $_SESSION["username"];

	$result2 = $mysqli->query("SELECT id from users where username = '$username';");
	$row2 = mysqli_fetch_assoc($result2);
	$user_id=$row2[id];

	

	$results = $mysqli->query("SELECT orderid, date, p.product_name, order_qnty, prod_amt FROM orders o, products p where user_id = '$user_id' and p.id = o.product_id ORDER BY orderid ASC");
	if($results){ 
	$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>OrderID</th><th>Date & Time</th><th>Product Name</th><th>Product Quantity</th><th>Product Total Amount</th>';//fetch results set as object and output HTML
	while($obj = $results->fetch_object())
	{
	$products_item .= <<<EOT
		<tr>
		<td><p align="center">{$obj->orderid}</p></td>
		<td><p align="center">{$obj->date}</p></td>
	    <td><p align="center">{$obj->product_name}</p></td>
	    <td><p align="center">{$obj->order_qnty}</p></td>
	    <td><p align="center">{$obj->prod_amt}</p></td>
		</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
}
?>    
</div>

</section>
</div>
</body>
</html>