<?php
	$link=mysqli_connect("localhost","root","","DBMS_project");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	if(empty($_POST['useruname']))
	{
		echo "username cannot be empty";
		exit;
	}
	elseif(empty($_POST['userpassword']))
	{
		echo "password cannot be empty";
		exit;
	}
	$sql="SELECT username FROM customer WHERE username = '$_POST[useruname]' AND password = '$_POST[userpassword]'";
	$result = mysqli_query($link,$sql);
	if($result)
	{
		$row = mysqli_fetch_array($result);
		if(empty($row[0]))
		{
			echo "username or password incorrect";
			exit;
		}
		else
		{
			echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
			echo '<script src="js/jquery-3.3.1.min.js"></script>';
			echo '<script src="js/bootstrap.min.js"></script>';
		}
	}
	else
	{
		echo "ERROR: ".mysqli_error($link);
		exit;
	}
?>
<!DOCTYPE html>
<head>
	<title>Transport DBMS|Customer</title>
</head>
<body class="container-fluid" style = "background-image: url(bg2.jpg);height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
	<h1 class="text-center bg-success">TRANSPORT DBMS</h1>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  	<!-- Indicators -->
  	
 	<!-- Wrapper for slides -->
 	<div class="carousel-inner">
		<div class="item active">
     		<div class="container">
 				<div class="container-fluid" onclick="location.href='smart-index.html';" style="cursor: pointer; background-color: rgb(255,255,255,0.5);";>
    				<h1 class="text-center">Book a ticket</h1>
  				</div>
			</div>
    	</div>
    	<div class="item">
      		<div class="container">
 				<div class="container-fluid" onclick="location.href='2048-index.htm';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5);">
    				<h1 class="text-center">Locate a bus</h1>
  				</div>
			</div>
    	</div>
    	<div class="item">
      		<div class="container">
 				<div class="container-fluid" onclick="location.href='ms-index.htm';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5);">
    				<h1 class="text-center">Bus Time-table</h1>
  				</div>
			</div>
    	</div>
    	<div class="item">
      		<div class="container">
 				<div class="container-fluid" onclick="location.href='gp-index.htm';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5);">
    				<h1 class="text-center">Coming soon</h1>
  				</div>
			</div>
    	</div>
  	</div>
	<ol class="carousel-indicators">
    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    	<li data-target="#myCarousel" data-slide-to="1"></li>
    	<li data-target="#myCarousel" data-slide-to="2"></li>
    	<li data-target="#myCarousel" data-slide-to="3"></li>
  	</ol>
	</div>
  <!-- Left and right controls -->
 	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    	<span class="glyphicon glyphicon-chevron-left"></span>
    	<span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right"></span>
    	<span class="sr-only">Next</span>
  	</a>
</body>