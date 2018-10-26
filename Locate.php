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
			Transport DBMS|Locate bus
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
		<h1>TRANSPORT DBMS|Locate bus</h1>
		<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<div class="form-group">
				<label for="source">Bus name:</label>
				<input type="text" class="form-control" id="source" name="busname">
			</div>
			<div class="form-group">
				<label for="source">Time:</label>
				<input type="text" class="form-control" id="source" name="time">
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
			$sql="SELECT place FROM bus_stop,bus_journey,bus where '$_POST[time]' BETWEEN Departure_time AND Arrival_time and bus_name='$_POST[busname]' and bus_journey.bus_id=bus.bus_id and Source_id=bus_stop_id UNION SELECT place FROM bus_stop,bus_journey,bus where '$_POST[time]' BETWEEN Departure_time AND Arrival_time and bus_name='$_POST[busname]' and bus_journey.bus_id=bus.bus_id and Destination_Id=bus_stop_id;";
			$result=mysqli_query($link,$sql) or die(mysqli_error($link));
		}
		if(mysqli_query($link,$sql))
		{
			$row = mysqli_fetch_assoc($result);
			if(empty($row)==false){
				echo "<h2>Bus is travelling<br/> From: ";
				echo $row['place'];
				echo " to: ";
				$row = mysqli_fetch_assoc($result);
				echo $row['place']."</h2>";
			}
			else
			{		

				$sql="SELECT place FROM bus_stop,bus_journey,bus WHERE '$_POST[time]' < Arrival_time AND bus_name= '$_POST[busname]' AND bus_journey.bus_id=bus.bus_id AND source_id=bus_stop_id AND Arrival_time- '$_POST[time]' = (SELECT MIN(Arrival_time - '$_POST[time]') FROM  bus_stop,bus_journey,bus WHERE '$_POST[time]' < Arrival_time AND bus_name='$_POST[busname]' AND bus_journey.bus_id=bus.bus_id AND source_id=bus_stop_id)";
				$result=mysqli_query($link,$sql) or die(mysqli_error($link));
				if(mysqli_query($link,$sql))
				{
					$row = mysqli_fetch_assoc($result);
					echo "<h2>Bus is at Bus stop: ";
					echo $row['place']."</h2>";
						
					
				}

			}
				
			
			
			
		}
	
	}
?>
