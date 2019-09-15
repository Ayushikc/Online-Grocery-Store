<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      
      move_uploaded_file($file_tmp,"imgs/".'rt1.png');
      
   }
?>