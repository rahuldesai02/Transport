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
			Transport DBMS|Bus schedule
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
		<h1>TRANSPORT DBMS|Bus schedule</h1>
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
			echo "busstop cannot be empty";
		}
		else
		{
			$sql="SELECT sourc.bus_name, sourc.Place as Source ,dest.place as Destination, sourc.Departure_time,sourc.Arrival_time ,sourc.fare
FROM
(
    SELECT bus_name ,Place, Departure_time,Arrival_time,fare FROM bus,bus_stop,bus_journey WHERE bus.Bus_Id = bus_journey.bus_Id and 	bus.Bus_Name = '$_POST[busname]' and bus_journey.Source_Id=bus_stop.Bus_Stop_ID
)as sourc
INNER JOIN
(
     SELECT bus_name ,Place, Departure_time,Arrival_time,fare FROM bus,bus_stop,bus_journey WHERE bus.Bus_Id = bus_journey.bus_Id and 	bus.Bus_Name = '$_POST[busname]' and bus_journey.Destination_Id=bus_stop.Bus_Stop_ID
)as dest
on sourc.bus_name=dest.bus_name and sourc.Departure_time=dest.Departure_time and sourc.arrival_time=dest.arrival_time ORDER BY sourc.Departure_time;";
			$result=mysqli_query($link,$sql) or die(mysqli_error());
		}
		if(mysqli_query($link,$sql))
		{
			echo "<table class='table table-hover' style='background:white'>
    		<thead style='background:rgb(40,40,40);color:white;'>
      		<tr>
			<th>Source</th>
			<th>Destination</th>
			<th>Departure time</th>
			<th>Arrival time</th>
			<th>Fare</th>
			</tr>
		    </thead>";
		    echo "<tbody>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['Source']."</td>";
				echo "<td>".$row['Destination']."</td>";
				echo "<td>".$row['Departure_time']."</td>";
				echo "<td>".$row['Arrival_time']."</td>";
				echo "<td>".$row['fare']."</td>";
				echo "</tr>";
				}
			echo "</tbody>";
			echo "</table>";

		}
	}
?>