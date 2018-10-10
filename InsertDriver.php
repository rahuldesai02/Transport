<?php
		
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	$sql="INSERT INTO driver(Name, Driver_Id, Contact_No, Salary, License_No) values ('$_POST[drivername]','$_POST[driverid]','$_POST[contactno]','$_POST[salary]','$_POST[license]')";

	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>