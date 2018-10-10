<?php
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	if(empty($_POST['useruname']))
	{
		echo "username cannot be empty";
	}
	elseif(empty($_POST['userpassword']))
	{
		echo "password cannot be empty";
		exit;
	}
	//$sql="INSERT INTO customer(username,password) values ('$_POST[newname]','$_POST[newpassword]')";
	if(mysqli_query($link,$sql))
	{
		echo "Record inserted successfully";
	}
	else
	{
		echo "ERROR:could not Insert $sql".mysqli_error($link);
	}
?>