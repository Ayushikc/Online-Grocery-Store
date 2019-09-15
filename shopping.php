<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: index.html");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="favi.png" sizes="16x16">
<style type="text/css">
html,body {
   overflow-x:hidden;
}
	body{
	background-image: url("back.jpg");
	background-attachment: fixed;
	background-size: cover;
	color: white;	
	width: 100%;
}

#header{
position: relative;
top: 0px;
font-family:'Righteous', 'Agency FB', cursive;
font-size: 70px;
padding-left: 23%;
}

#cate1{
width:375px;
height:350px;
background-color: white;
border-radius: 25px;
font-family:Verdana;
font-size:20px;
text-align:center;
margin-top: 10px;
margin-bottom:10px;
float:left;

}

#cate2{
width:375px;
height:350px;
background-color: white;
border-radius: 25px;
font-family:Verdana;
font-size:20px;
text-align:center;
margin-top: 10px;
margin-bottom:10px;
float: right;
}

#cate3{
width:375px;
height:350px;
background-color: white;
border-radius: 25px;
font-family:Verdana;
font-size:20px;
text-align:center;
margin-top: 10px;
margin-bottom:10px;
float:right;
}

img.circle{
border-radius: 180px;
width:200px;
height:200px;
padding-top: 25px;
left:15px;
top:15px;
}

p{
	color: black;
	font-size: 1.4em;
	padding-top: 1em;		
}
#login{
	float:right;
}

/* LOGOUT BUTTON STARTS */
#logoutButton{
	background-color: #00CC99;
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
#logoutButton:hover{
	background-color:#44c767;
	position:relative;
	top:5px;
}

/* LOGOUT BUTTON ENDS */
</style>
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<title>Choose Category</title>

</head>
<body bgcolor=black>

<div id=login>
	
	<a href="destroy.php"><span id="logoutButton">Log Out</span></a><br><br>
	
</div>
<?php echo $_SESSION['username'];
if($_SESSION['username'] == 'admin'){
echo '<br/><a style = "color : white;" href="admin.php"><table><tr><td><img src="imgs/icons/home.png" />Admin Page</a><br><br>';
}
?>
<br>

<div id="header"> <center><strong>Choose Category</strong></center></div>

<table cellspacing="25px" cellpadding="5px">
<tr>

<td><div id="cate1"> 
<a href="cate1.php" style="text-decoration: none;">
<img class="circle" src="cate1.jpg">
<p><strong>Meat & SeaFood</strong></p>
</a>
</div></td>

<td><div id="cate2">
<a href="cate2.php" style="text-decoration: none;">
<img class="circle" src="cate2.jpg">
<p><strong>Fruits & Vegetables</strong></p>
</a>
</div></td>

<td><div id="cate3">
<a href="cate3.php" style="text-decoration: none;">
<img class="circle" src="cate3.jpg">
<p><strong>Bakery & Dairy</strong></p>
</a>
</div></td>

</tr>

</table>

</body>
</html>