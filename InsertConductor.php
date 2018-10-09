<?php
		
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	$sql="INSERT INTO conductor values ('$_POST[conductorname]','$_POST[conductorid]','$_POST[contactno]','$_POST[salary]')";

	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>