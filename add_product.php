<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product | Online Grocery Shopping</title>
	<link rel="icon" href="favi.png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar2.css">

	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		body{
			margin: 0;						
	background-image: url("back.jpg");
	background-attachment: fixed;
	background-size: cover;
	color: white;	
}
		#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 62px;
			float: left;	
			position: fixed;		
		}
		#addForm{
			padding-top: 10px;
			padding-left: 30px;
		}
	</style>
	
</head>

<body>

<div id="logo">
	<a href="admin.php">
		<img src="imgs/logo.png" width="100%">
	</a>
</div>

<div id="sidebar">
	<ul>
		<li style = >Welcome <?php echo $_SESSION['username'];?></li>
				
		<li>
			<a href="destroy.php"> 
			<table><tr><td><img src="imgs/icons/logout2.png" /></td>
			<td>&nbsp;Logout</td></tr></table></a>
		</li>

		<li>&nbsp;</li>
		
	</ul>
</div>

<div id="navbar">
	<ul>
		<li><a href="inventory.php">Inventory</a></li>
		<li><a class="active" href="add_product.php">Add Product</a></li>
		<li><a href="update_product.php">Update Product</a></li>
		<li><a href="remove_product.php">Remove Product</a></li>
	</ul>
</div>


<!-- BACK TO TOP-->
<a href="#" class="back-to-top">Back To Top </a>

<!--CONTENT-->

<div class="content" style="color: white;">
	<section class="container">

<!-- FORM -->
<div id="addForm">
<form name="productForm" method="post" action="add.php" enctype="multipart/form-data">
<table width="45%"> 
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr>
	<td  colspan="2">
		<label>Select image to upload &nbsp;&nbsp;</label>
		<input type="file" name="image"><br/>
	</td>

</tr>
	<tr>
	<td>
		<label>Product Code &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="product_code" required>
	</td>
</tr>

<tr>
	<td>
		<label>Category &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="category" required>
	</td>
</tr>

<tr>
	<td>
		<label>Department &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="dept" required>
	</td>
</tr>

<tr>
	<td>
		<label>Product Name &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="product_name" required>
	</td>
</tr>




<tr>
	<td>
		<label>Quantity &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="product_qty" required>
	</td>
</tr>

<tr>
	<td>
		<label>Price &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="price" required>
	</td>
</tr>



<tr>
	<td colspan="3">&nbsp;</td>
</tr>


<tr>
<td>&nbsp;</td>
<td>
	<input type="submit" name="addproduct" value="Add Product" class="click">
</td>
<td>&nbsp;</td>
</tr>

</table>
</form>
</div>


</section>
</div>

</body>
</html>