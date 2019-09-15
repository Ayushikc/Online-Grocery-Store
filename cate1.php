<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Meat & Seafood</title>
	<link rel="icon" href="favi.png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
	function addtocartFunc(){
		alert("Item has been added to cart");
	}
</script>
	<style type="text/css">
		body{
			margin: 0;						
		}
		#logo{
						
			background-color: #333;
			width: 14%;
			height: 8.5%;
			float: left;
			position: fixed;
		}
	.pagination a
{
  color: red;
  float: left;
  padding: 10px 16px;
  margin-left: 30px;
}
div.x
{
  background-color: white;
    margin-left: 600px;
     margin-right: 450px;
    
}
.pagination a.active
{
  background-color: green;
  color: white;
}
.pagination a:hover:not(.active){background-color: green;}
	
	.search {
    float: right;
    padding: 6px;
    
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
     border: 1px solid #ccc;
}
	</style>
</head>



<body>

<div id="logo">
	<a href="shopping.php">
		<img src="imgs/logo.png" width="100%">
	</a>
</div>


<div id="sidebar">
	<ul>
		<li>Welcome <?php echo $_SESSION['username'];?></li>
		
		<?php
		if($_SESSION['username'] == 'admin'){
		echo '<li><a href="admin.php"><table><tr><td><img src="imgs/icons/home.png" /></td>
		<td>&nbsp;Admin Page</td></tr></table></a></li>
		<li>&nbsp;</li>';
		}
		?>
		<li><a href="view_cart.php"><table><tr><td><img src="imgs/icons/cart.png" /></td>
		<td>&nbsp;Shopping Cart</td></tr></table></a></li>
		<li>&nbsp;</li>


		<li><a href="view_cart.php"><table><tr><td><img src="imgs/icons/checkout.png" /></td>
		<td>&nbsp;Checkout&nbsp;</td></tr></table></a></li>

		<li><a href="history.php"><table><tr><td><img src="imgs/icons/history.png" /></td>
		<td>&nbsp;History&nbsp;</td></tr></table></a></li>

		<li>
			<a href="destroy.php"> 
			<table><tr><td><img src="imgs/icons/logout.png" /></td>
			<td>&nbsp;Logout</td></tr></table></a>
		</li>

		<li>&nbsp;</li>		
		
	</ul>
</div>

<div id="navbar">
	<ul>
		<li><a class="active" href="cate1.php">Meat & Sea Food</a></li>
		<li><a href="cate2.php">Fruits & Vegetables</a></li>
		<li><a href="cate3.php">Bakery & Dairy</a></li>		

		<form action = "search.php" method= "POST">
		<input class = "search" type="hidden" name = "category" value="Meat & SeaFood">	
  		<input class = "search" type="search" name = "search" placeholder="Search..">
  		<button class = "search" type="submit"><i class="fa fa-search"></i></button>
  	    </form>

	</ul>
</div>



<!--CONTENT-->

<div class="content">
	<section class="container">
<div class="row">


	<h3>MEAT AND SEAFOOD</h3>
<?php

$page=$_GET["page"];
if($page=="" || $page=="1")
{
  $page1=0;
}
else
{
  $page1=($page*5)-5;
}

	$results = $mysqli->query("SELECT product_code, product_name, product_img_name, price FROM products where category='Meat & SeaFood' ORDER BY id ASC limit $page1,5");

if($results){ 
$products_item = '<ul style="list-style-type: none; padding-left:0px;">';
//fetch results set as object and output HTML

while($obj = $results->fetch_object())
{

$products_item .= <<<EOT
	
	<div class="col-sm-12 container-fluid">
	<div class="box">
	<li class="product">
	<form method="post" action="cart_update.php">	
	<img src="imgs/{$obj->product_img_name}">
	<p align="center">{$obj->product_name}</p>
	<p align="center" style="font-size: 1.2em;">{$currency}{$obj->price} </p>
	
	
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />

	<div align="center">
		<label>Quantity: </label>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1"/>&nbsp;&nbsp;
		<button type="submit" class="add_to_cart" id="myButton" onclick ="addtocartFunc();">Add to Cart</button>
	</div>
	
	</form>
	</li>
	</div>
	</div>
	
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}

$res = $mysqli->query("SELECT product_code, product_name, product_img_name, price FROM products where category='Meat & SeaFood'");
$cou=mysqli_num_rows($res) ;
$a=$cou/5;
$a=ceil($a);
echo "<br>"; echo '<br>';
for($b=1;$b<=$a;$b++)
{
  ?><div class='pagination'><a href="cate1.php?page=<?php echo $b; ?>"style="text-decoration: underline"><?php echo $b." "; ?></a></div><?php
}
//mysqli_close($conn);
?>
</div>


</section>
</div>



</body>
</html>