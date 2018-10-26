<?php
	session_start();
	$_SESSION['username'] = $_POST['useruname'];
	echo '<div class="text-right"><h3>Logged in as: '.$_SESSION['username'].'</h3></div>';
	$link=mysqli_connect("localhost","root","","transport");
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
	$_SESSION['username'] = $_POST['useruname'];
	$sql="SELECT username,password FROM customer";
	$result = mysqli_query($link,$sql);
	if($result)
	{
		$flag = 0;
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['username'] == $_POST['useruname'] and $row['password'] == $_POST['userpassword'])
			{
				$flag = 1;
			}
		}
		if($flag == 0)
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
	<h1 class="text-center bg-success">TRANSPORT DBMS|CUSTOMER</h1>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  	<!-- Indicators -->
  	
 	<!-- Wrapper for slides -->
 	<div class="carousel-inner">
		<div class="item active">
 				<div class="container-fluid" onclick="location.href='Book.php';" style="cursor: pointer; background-color: rgb(255,255,255,0.5); height:80%;display: flex; align-items: center; justify-content: center";>
    				<p style="font-size:4em">Book a ticket</p>
  				</div>
    	</div>
    	<div class="item">
 				<div class="container-fluid" onclick="location.href='locate.php';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5); height:80%;display: flex; align-items: center; justify-content: center">
    				<p style="font-size:4em">Locate a bus</p>
  				</div>
    	</div>
    	<div class="item">
 				<div class="container-fluid" onclick="location.href='BusSchedule.php';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5); height:80%;display: flex; align-items: center; justify-content: center">
    				<p style="font-size:4em">Bus Schedule</p>
  				</div>
    	</div>
    	<div class="item">
 				<div class="container-fluid" onclick="location.href='BusStopSchedule.php';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5); height:80%;display: flex; align-items: center; justify-content: center">
    				<p style="font-size:4em">Bus-stop Time-table</p>
  				</div>
    	</div>
		<div class="item">
 				<div class="container-fluid" onclick="location.href='BusDetails.php';" style="cursor: pointer;  background-color: rgb(255,255,255,0.5); height:80%;display: flex; align-items: center; justify-content: center">
    				<p style="font-size:4em">Bus Details</p>
  				</div>
    	</div>
  	</div>
	<ol class="carousel-indicators">
    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    	<li data-target="#myCarousel" data-slide-to="1"></li>
    	<li data-target="#myCarousel" data-slide-to="2"></li>
    	<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
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