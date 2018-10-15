<?php
		
	$link=mysqli_connect("localhost","root","","DBMS_project");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	if(isset($_POST['busid']))
	{
		$sql="INSERT INTO bus values ('$_POST[regno]','$_POST[busname]','$_POST[busid]','$_POST[buscol]','$_POST[busman]',$_POST[driverid],$_POST[conductorid],$_POST[ownerid])";
	}
	else if(isset($_POST['driverid']))
	{
		$sql="INSERT INTO driver values ('$_POST[drivername]','$_POST[driverid]','$_POST[contactno]','$_POST[salary]','$_POST[license]')";
	}
	else if(isset($_POST['conductorid']))
	{
		$sql="INSERT INTO conductor values ('$_POST[conductorname]','$_POST[conductorid]','$_POST[contactno]','$_POST[salary]')";
	}
	else if(isset($_POST['ownerid']))
	{
		$sql="INSERT INTO owner values ('$_POST[ownerid]','$_POST[ownername]','$_POST[contactno]')";
	}
	else if(isset($_POST['busstopid']))
	{
		$sql="INSERT INTO bus_stop values ('$_POST[busstopid]','$_POST[place]','$_POST[coordinates]')";
	}
	else if(isset($_POST['arrival']))
	{
		$sql="INSERT INTO bus_stops_at values ('$_POST[bus]','$_POST[busstop]','$_POST[arrival]','$_POST[departure]')";
	}
	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>

