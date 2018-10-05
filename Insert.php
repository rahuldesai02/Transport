<?php
		
	$link=mysqli_connect("localhost","root","","project");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	$sql="INSERT INTO student(Fname,Lname) values ('$_POST[fname]','$_POST[lname]')";

	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>