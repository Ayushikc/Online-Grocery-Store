<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Grocery Shopping</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src ="js/my_login_action.js"></script>
    
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="w3-panel w3-blue w3-round-xlarge" style="margin-top: 40%">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    
                <?php
                  session_start();
                  $username=$_POST["username"];
                  $email=$_POST["email"];
                  $password=$_POST["pswd"];
                  $hash=password_hash($password,PASSWORD_DEFAULT);
                  $_SESSION["username"]=$_POST["username"];
                  //$country = $_POST["country"];
                  $phone = $_POST["phone"];
                  //$usertype = $_POST["usertype"];

                  $mysqli = new mysqli("localhost","root","root","project");
                      if ($mysqli->connect_error){
                          die('Could not connect to database!');
                      }
                      
                  $sql="INSERT into users(username,phone,email,password) values ('$username','$phone','$email','$hash')";

                  if(!mysqli_query($mysqli,$sql)){die('error');}

                  mysqli_close($mysqli);
                ?>
                <div>
                  <h3> Hey <?php echo $_SESSION["username"]?>!!</h3>
                  <p>Congratulations! </br>You are successfully registered.</br></p>
                      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login" onclick="location.href='index.html';">
                </div>
                </div>
            </div>
        </div>
</body>
    </div>
</div>

</html>