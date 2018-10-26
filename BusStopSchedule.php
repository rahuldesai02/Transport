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
			Transport DBMS|Bus stop schedule
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
	<h1>TRANSPORT DBMS|Bus Stop schedule</h1>
		<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<div class="form-group">
				<label for="source">Bus-Stop name:</label>
				<input type="text" class="form-control" id="source" name="busstop">
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
		if(empty($_POST['busstop']))
		{
			echo "busstop cannot be empty";
		}
		else
		{
			$sql="SELECT bus_name,Departure_time,place FROM bus,bus_journey,bus_stop WHERE Source_Id=(SELECT DISTINCT bus_stop_id FROM bus_stop WHERE place='$_POST[busstop]') and bus_stop_id=Destination_Id and bus.bus_id = bus_journey.bus_id";
			$result=mysqli_query($link,$sql) or die(mysqli_error());
		}
		if(mysqli_query($link,$sql))
		{
			echo "<table class='table table-hover' style='background:white'>;
    		<thead style='background:rgb(40,40,40);color:white;'>
      		<tr>
			<th>Bus Name</th>
			<th>Departure_time</th>
			<th>Desination</th>
			</tr>
		    </thead>";
		    echo "<tbody>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['bus_name']."</td>";
				//echo "<td>".$row['Arrival_time']."</td>";
				echo "<td>".$row['Departure_time']."</td>";
				echo "<td>".$row['place']."</td>";
				echo "</tr>";
				}
			echo "</tbody>";
			echo "</table>";

		}
	}
?>