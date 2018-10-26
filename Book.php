<?php
	echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
	echo '<script src="js/jquery-3.3.1.min.js"></script>';
	echo '<script src="js/bootstrap.min.js"></script>';
	session_start();
	echo '<div class="text-right"><h3>Logged in as: '.$_SESSION['username'].'</h3></div>';
	if(isset($_POST['2']))
	{
		$link=mysqli_connect("localhost","root","","transport");
		if($link === false)
		{
			die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
		}
		$sql = "UPDATE bus_journey SET Available_seats = Available_seats - 1 WHERE source_id = (SELECT bus_stop_id FROM bus_stop WHERE place = '$_POST[2]' ) AND destination_id = (SELECT bus_stop_id FROM bus_stop WHERE place = '$_POST[3]' ) AND Departure_time ='$_POST[4]' AND Arrival_time = '$_POST[5]' AND Fare = '$_POST[6]';";
		if(!mysqli_query($link,$sql))
		{
			echo 'ERROR while inserting';
		}
	}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Transport DBMS|Book
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
		<h1>TRANSPORT DBMS|BOOK</h1>
		<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<div class="form-group">
				<label for="source">Source:</label>
				<input type="text" class="form-control" id="source" name="source">
			</div>
			<div class="form-group">
				<label for="destination">Destination:</label>
				<input type="text" class="form-control" id="destination" name="destination">
			</div>
			<button type="submit" class="btn btn-default" name="submit">Submit</button>
		</form> 
	</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		echo '<script>
				ticket = function(row){
					text = row.innerText || row.textContent;
					ticketno = Math.floor(Math.random() * 99999)+10000;
					departure = text.split("\t")[1];
					arrival = text.split("\t")[2];
					fare = text.split("\t")[3];
					changes = document.getElementById("2");
					changes.value = "'.$_POST["source"].'";
					changes = document.getElementById("3");
					changes.value = "'.$_POST["destination"].'";
					changes = document.getElementById("4");
					changes.value = departure;
					changes = document.getElementById("5");
					changes.value = arrival;
					changes = document.getElementById("6");
					changes.value = fare;
					changes = document.getElementById("8");
					var s = "TICKET BOOKED!\nSource: "+"'.$_POST['source'].'"+"\nDestination: "+"'.$_POST['destination'].'"+"\nTicket Number: "+ticketno+"\nDeparture Time: "+departure+"\nArrival Time: "+arrival+"\nFare: "+fare;';
			echo 'alert(s);changes.submit();}</script>';
		$link=mysqli_connect("localhost","root","","transport");
		if($link === false)
		{
			die("ERROR:COULD NOT CONNECT".mysqli_connect_error());
		}
		if(empty($_POST['source']))
		{
			echo "source cannot be empty";
		}
		elseif(empty($_POST['destination']))
		{
			echo "destination cannot be empty";
			exit;
		}
		else
		{
			$sql="SELECT DISTINCT bus.bus_id, bus_name, arrival_time, departure_time, fare, available_seats FROM bus, bus_journey WHERE source_id = (SELECT bus_stop_id FROM bus_stop WHERE place = '$_POST[source]') AND  destination_id = (SELECT bus_stop_id FROM bus_stop WHERE place = '$_POST[destination]') and bus.bus_id = bus_journey.bus_id;";
			$result = mysqli_query($link,$sql);
		}
		if($result)
		{	
			echo '<table class="table table-hover" style="background:rgb(220,220,220);">
						<thead>
						<tr style="background:rgb(40,40,40);color:white;">
							<th>Bus Name</th>
							<th>Departure Time</th>
							<th>Arrival Time</th>
							<th>Fare</th>
							<th>Available Seats</th>
						</tr>
						</thead>
					<tbody>';
			while($row = mysqli_fetch_assoc($result)){
				echo '<tr  onclick="ticket(this)"><td>'.$row['bus_name'].'</td>';
				echo '<td>'.$row['departure_time'].'</td>';
				echo '<td>'.$row['arrival_time'].'</td>';
				echo '<td>'.$row['fare'].'</td>';
				echo '<td>'.$row['available_seats'].'</td></tr>';	
			}
			echo '</tbody></table>';
		}
		else
		{
			echo "ERROR:could not $sql".mysqli_error($link);
		}
	}
?>
<form id="8" style="display:none;"action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	<!--input id="1" type="text" name="1"-->
	<input id="2" type="text" name="2">
	<input id="3" type="text" name="3">
	<input id="4" type="text" name="4">
	<input id="5" type="text" name="5">
	<input id="6" type="text" name="6">
	<input id="7" type="submit">
</form>
