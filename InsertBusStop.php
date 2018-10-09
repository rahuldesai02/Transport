<?php
		
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	$sql="INSERT INTO bus_stop values ('$_POST[busstopid]','$_POST[place]','$_POST[coordinates]')";

	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>