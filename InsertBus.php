<?php
		
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	$sql="INSERT INTO bus(Reg_No,Bus_Name,Bus_Id,Bus_Colour,Bus_Manufacturer) values ('$_POST[regno]','$_POST[busname]','$_POST[busid]','$_POST[buscolour]','$_POST[busmanufacturer]')";

	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>