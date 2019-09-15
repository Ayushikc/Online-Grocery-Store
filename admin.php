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
	body{
	background-image: url("back.jpg");
	background-attachment: fixed;
	background-size: cover;
	color: white;	
}

#header{
position: relative;
top: 0px;
font-family:'Bree Serif','Agency FB';
font-size: 60px;
padding-left: 30%;
}

#website{
width:800px;
height:150px;
background-color: #48C9B0  ;
border-radius: 15px;
font-family: 'Gloria Hallelujah', 'Verdana', cursive;
font-size:40px;
text-align:center;
margin-top: 20px;
margin-bottom:20px;
margin-left: 170px;
opacity: 0.9;
padding-top : 4.5px;
}

#inventory{
width:800px;
height:150px;
background-color: #48C9B0  ;
border-radius: 15px;
font-family: 'Gloria Hallelujah', 'Verdana', cursive;
font-size:40px;
text-align:center;
margin-top: 20px;
margin-bottom:20px;
margin-left: 170px;
opacity: 0.9;
padding-top : 4.5px;
}

p{
	color: black;
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


<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
<title>Admin | Online Grocery Shopping</title>
<style type="text/css">
		#logo{			
			width: 20.1%;
			float: left;
		}
		body{
			margin-top: 3em;
			margin-left: 3em;
		}
	</style>
</head>
<body >


<div id=login style="float: right;">
	<a href="destroy.php"><span id="logoutButton">Log Out</span></a><br><br>
	<?php echo $_SESSION['username'];?>
</div>
<br>

<div id="header"> &nbsp;&nbsp;&nbsp;<strong>Select Option</strong> </div>

<table cellspacing="30px" cellpadding="5px">
<tr>
<td>
<div id="website">
	
	<a href="shopping.php" target="_blank" style="text-decoration: none;">
	<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Visit Website</strong></p>
	</a>
	

</div>
</td>
</tr>

<tr>
<td>
<div id="inventory">
	
	<a href="inventory.php" style="text-decoration: none;">
	<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;View Inventory</strong></p>
	</a>
	
</div>
</td>

</tr>
</table>

</body>
</html>