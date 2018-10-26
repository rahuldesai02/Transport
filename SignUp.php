<?php
		
	$link=mysqli_connect("localhost","root","","transport");
	if($link === false)
	{
		die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
	}
	if(empty($_POST['newname']))
	{
		echo "username cannot be empty";
	}
	elseif(empty($_POST['newpassword']))
	{
		echo "password cannot be empty";
		exit;
	}
	elseif(strcmp($_POST['newpassword'],$_POST['confirmpassword'])===0)
		$sql="INSERT INTO customer(username,password) values ('$_POST[newname]','$_POST[newpassword]')";
	else
	{
		echo "passwords do not match";
		exit;
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