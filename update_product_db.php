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

//$code = ($_POST['product_code']);
$product_code=$_POST[product_code];
$category=$_POST[category];
$id = $_POST[id];
$dept=$_POST[dept];
$product_name=$_POST[product_name];
$price = $_POST[price];
$product_qty=$_POST[product_qty];
$product_img_name = $product_code.'.png';

 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      
      move_uploaded_file($file_tmp,"imgs/".$product_img_name);
      
   }
	
//$sql = "DELETE FROM products WHERE product_code='".$code."'"; 

mysqli_query($con,"UPDATE products SET product_code = '$product_code', product_img_name = '$product_img_name' , category = '$category' , dept = '$dept', product_name='$product_name' , price='$price', product_qty = '$product_qty' WHERE id = '$id'");


header('Location:inventory.php');

?>
