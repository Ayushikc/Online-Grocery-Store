<?php
session_start();
include_once("config.php");



	$code = ($_POST['product_code']);
	$name = ($_POST['product_name']);
	$cat = ($_POST['category']);
	$dept = ($_POST['dept']);
	$fees = ($_POST['price']);
    $quant = ($_POST['product_qty']);
    $img_name = $code.'.png';

 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      
      move_uploaded_file($file_tmp,"imgs/".$img_name);
      
   }

$sql = "INSERT INTO products(product_code,product_name,category,dept,product_img_name,price,product_qty) VALUES ('$code','$name','$cat','$dept','$img_name','$fees','$quant')";

if (mysqli_query($mysqli,$sql)){
	echo '<script type="text/javascript">alert("New product added. Add more!");</script>';
	header("Location:http://localhost/Project/add_product.php");
} 
else 
{
	echo '<script type="text/javascript">alert("Error Occured");</script>';
	header("Location:http://localhost/Project/add_product.php");

}



?>