<?php
	echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
	echo '<script src="js/jquery-3.3.1.min.js"></script>';
	echo '<script src="js/bootstrap.min.js"></script>';
	session_start();
	echo '<div class="text-right"><h3>Logged in as: '.$_SESSION['username'].'</h3></div>';
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Transport DBMS|Bus Details
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
		<h1>TRANSPORT DBMS|Bus Details</h1>
		<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<div class="form-group">
				<label for="source">Bus name:</label>
				<input type="text" class="form-control" id="source" name="busname">
			</div>
			<button type="submit" class="btn btn-default" name="submit">Submit</button>
		</form> 
	</body>
</html>
<?php
	if(isset($_POST['submit'])) 
	{
		$link=mysqli_connect("localhost","root","","transport");
		if($link === false)
		{
			die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
		}
		if(empty($_POST['busname']))
		{
			echo "busname cannot be empty";
		}
		else
		{
			$sql="SELECT  Bus_Name,Bus_Id,Bus_Colour,Bus_Manufacturer,Reg_No,Owner_Name,owner.Contact_No,conductor.name as cname,driver.name as dname FROM bus,owner,conductor,driver WHERE Bus_Name='$_POST[busname]' and bus.Owner_ID=owner.Owner_ID and conductor.conductor_id = bus.conductor_id and driver.driver_id=bus.driver_id;";
			$result=mysqli_query($link,$sql) or die(mysqli_error($link));
		}
		if(mysqli_query($link,$sql))
		{
			echo "<table class='table table-hover' style='background:white;'>
			<thead style='background:rgb(40,40,40);color:white;'>
			<tr>
			<th>Bus Name</th>
			<th>Id</th>
			<th>Colour</th>
			<th>Manufacturer</th>
			<th>Reg_No</th>
			<th>Owner_Name</th>
			<th>Contact_No</th>
			<th>Conductor</th>
			<th>Driver</th>
			</tr>
			</thead>";
			echo "<tbody>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['Bus_Name']."</td>";
				echo "<td>".$row['Bus_Id']."</td>";
				echo "<td>".$row['Bus_Colour']."</td>";
				echo "<td>".$row['Bus_Manufacturer']."</td>";
				echo "<td>".$row['Reg_No']."</td>";
				echo "<td>".$row['Owner_Name']."</td>";
				echo "<td>".$row['Contact_No']."</td>";
				echo "<td>".$row['cname']."</td>";
				echo "<td>".$row['dname']."</td>";
				echo "</tr>";
				}
			echo "</tbody>";
			echo "</table>";

		}
	}
?>
