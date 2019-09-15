<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="favi.png" sizes="16x16">
<title>Shopping Cart | Online Grocery Store</title>
<style type="text/css">
	body{
	margin: 0px;
	padding: 0px;
	font-family: Georgia, "Times New Roman", Times, serif;
	background-image: url("back.jpg");
	background-attachment: fixed;
	background-size: cover;
	
}
h1, h2, h3{
	font-family: "Righteous", sans-serif;	
	font-size: 43px;
}

ul.products {
	padding: 0;
	margin: 0;
	max-width: 740px;
	margin-left: auto;
	margin-right: auto;
}
ul.products li {
	display: inline-block;
	max-width: 200px;
	padding: 10px;
	background-color: #FFFFFF;
	margin: 10px;
	border: 1px solid #EAEAEA;  
	color: #3D3D3D;
}
ul.products li h3 {
	margin: -10px -10px 10px -10px;
	padding: 10px;
	text-align: center;
	background-color: #F5F5F5;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 1.1em;
	color: #5A5A5A;
}


button, .button, #checkoutButton{
	background-color: #44c767;
	min-width: 100px;
	border: none;
	padding: 10px;
	display: inline-block;
	text-align: center;
	cursor: pointer;
	text-decoration: none;
	color: #FFF;
	min-height: 15px;
	font: 12px/15px Arial, Helvetica, sans-serif;
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	border-radius: 3px;
}
button:hover, .button:hover, #checkoutButton:hover{
	background-color:#5cbf2a;
	position:relative;
	top:5px;
}

.product-thumb{
	text-align:center;
}
.product-desc {
	font-style: italic;
	font-size: 0.8em;
	margin-bottom: 4px;
	height: 40px;
	overflow: hidden;
	margin-top: 5px;
}

ul.shopping-cart{
	position: fixed;
	top: 100px;
	right: 0;
	background-color: #F9F9F9;
	padding: 10px;
	min-width: 250px;
	list-style: none;
	font-size: 0.8em;
	border: 1px solid #F0F0F0;
}
ul.shopping-cart .cart-itm {
	margin-bottom: 10px;
	border-bottom: 1px solid #ddd;
	padding-bottom: 8px;
}
ul.shopping-cart .cart-itm:last-child{
	border-bottom: none;
	margin-bottom: 0px;
}
ul.shopping-cart .cart-itm .remove-itm{
	float: right;
	font-size: 1.5em;
}
ul.shopping-cart .cart-itm .remove-itm a{
	text-decoration:none;
	color:#000;
}
.cart-total-text a{
	float:right;
}

.cart-view-table-front{
	font-size: 0.7em;
	position: fixed;
	right: 10px;
	max-width: 350px;
	font-family: Arial
}
.cart-view-table-front h3{
	text-align: center;
	padding: 0;
	margin: 0px 0px 6px 0px;
}
.cart-view-table-front, .cart-view-table-back {
	max-width: 700px;
	background-color: #FFFFFF;
	margin-left: auto;
	margin-right: auto;
	padding: 10px;
	box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.12);
	border: 1px solid #E4E4E4;
}
.cart-view-table-front table th, .cart-view-table-back table th{
	text-align: left;
}
.cart-view-table-front table thead, .cart-view-table-back table thead{
	background-color: #73e567;
}
.cart-view-table-front table tbody tr.even, .cart-view-table-back table tbody tr.even{
	background-color: #F7F7F7;
}
.cart-view-table-front table tbody tr.odd, .cart-view-table-back table tbody tr.odd{
	background-color: #EDEDED;
}
.cart-view-table-front button, .cart-view-table-front .button, .cart-view-table-back button, .cart-view-table-back .button{
	margin: 10px 1px;
	float: right;
}

</style>
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<style type="text/css">
	#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 9.65%;
			float: left;
			position: fixed;
			margin-left: 2px;
		}
</style>

<script type="text/javascript">
	function checkoutFunction(){
		alert("Your Order Has Been Placed!");
		window.location.assign("order.php");
	}
</script>
</head>
<body>

<div id="logo">
	<a href="shopping.php">
		<img src="imgs/logo.png" width="100%">
	</a>
</div>

<h1 align="center" style="color:white;">Shopping Cart</h1>
<div class="cart-view-table-back">

<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Category</th><th>Department</th><th>Name</th><th>Price</th><th>Subtotal</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			
			$category = $cart_itm["category"];
			$dept = $cart_itm["dept"];
			$product_name = $cart_itm["product_name"];			
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];		
			$product_qty = $cart_itm["product_qty"];	
			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
		    echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			
			echo '<td>'.$category.'</td>';
			echo '<td>'.$dept.'</td>';
			echo '<td>'.$product_name.'</td>';			
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		
	}
    ?>
    <tr><td colspan="7">&nbsp;</td></tr>
    <tr><td colspan="6"><span style="float:right;text-align: right;">Amount Payable: &#36; <?php echo sprintf("%01.2f", $total);?></span></td></tr>

    <tr>
    	<td colspan="4"><a href="shopping.php" class="button">Add More Items</a></td>
    	<td><button type="submit">Update</button></td>

    	
    	<td><input type="button" onclick ="checkoutFunction();" value="Checkout" id="checkoutButton" /></td>
    

    </tr>


  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
