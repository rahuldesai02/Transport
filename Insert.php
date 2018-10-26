<?php
		
	$link=mysqli_connect("localhost","root","","transport");
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
		$sql="INSERT INTO bus_stop values ('$_POST[busstopid]','$_POST[place]')";
	}
	else if(isset($_POST['arrival']))
	{
		$sql="INSERT INTO bus_journey values ('$_POST[bus]','$_POST[source]','$_POST[destination]','$_POST[departure]','$_POST[arrival]','$_POST[fare]')";
	}
	if(mysqli_query($link,$sql))
	{
		echo "<script>alert('Record inserted successfully'); window.history.go(-1);</script>";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>