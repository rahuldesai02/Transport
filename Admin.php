<?php
	if($_POST['adminuname'] == "admin" && $_POST['adminpassword'] == "password")
	{
		echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
		echo '<script src="js/jquery-3.3.1.min.js"></script>';
		echo '<script src="js/bootstrap.min.js"></script>';
	}
	else
	{
		echo "Incorrect username or password";
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Transport DBMS|Admin
		</title>
	</head>
	<body class = "container-fluid" style = "background-image: url(bg3.jpg);height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
		<h1>TRANSPORT DBMS</h1>
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Welcome</a>
			</div>
			<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Bus Details
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "busid">Bus ID:</label>
								<input type = "text" class="form-control" id="busid" name = "busid"/>
							</div>
							<div class="form-group">
								<label for = "busname">Bus name:</label>
								<input type = "text" class="form-control" id="busname" name = "busname"/>
							</div>
							<div class="form-group">
								<label for = "regno">Registration number:</label>
								<input type = "text" class="form-control" id="regno" name = "regno"/>
							</div>
							<div class="form-group">
								<label for = "busman">Bus Manufacturer:</label>
								<input type = "text" class="form-control" id="busman" name = "busman"/>
							</div>
							<div class="form-group">
								<label for = "buscol">Bus Color:</label>
								<input type = "text" class="form-control" id="buscol" name = "buscol"/>
							</div>
							<div class="form-group">
								<label for = "ownerid">Owner ID:</label>
								<input type = "text" class="form-control" id="ownerid" name = "ownerid"/>
							</div>
							<div class="form-group">
								<label for = "driverid">Driver ID:</label>
								<input type = "text" class="form-control" id="driverid" name = "driverid"/>
							</div>
							<div class="form-group">
								<label for = "conductorid">Conductor ID:</label>
								<input type = "text" class="form-control" id="conductorid" name = "conductorid"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Driver Details
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "driverid">Driver ID:</label>
								<input type = "text" class="form-control" id="driverid" name = "driverid"/>
							</div>
							<div class="form-group">
								<label for = "drivername">Driver name:</label>
								<input type = "text" class="form-control" id="drivername" name = "drivername"/>
							</div>
							<div class="form-group">
								<label for = "contactno">Contact number:</label>
								<input type = "text" class="form-control" id="contactno" name = "contactno"/>
							</div>
							<div class="form-group">
								<label for = "salary">Salary:</label>
								<input type = "text" class="form-control" id="salary" name = "salary"/>
							</div>
							<div class="form-group">
								<label for = "license">License number:</label>
								<input type = "text" class="form-control" id="license" name = "license"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Conductor Details
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "conductorid">Conductor ID:</label>
								<input type = "text" class="form-control" id="conductorid" name = "conductorid"/>
							</div>
							<div class="form-group">
								<label for = "conductorname">Conductor Name:</label>
								<input type = "text" class="form-control" id="conductorname" name = "conductorname"/>
							</div>
							<div class="form-group">
								<label for = "contactno">contact number:</label>
								<input type = "text" class="form-control" id="contactno" name = "contactno"/>
							</div>
							<div class="form-group">
								<label for = "salary">Salary:</label>
								<input type = "text" class="form-control" id="salary" name = "salary"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Bus-Stop Details
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "busstopid">Busstop ID:</label>
								<input type = "text" class="form-control" id="busstopid" name = "busstopid"/>
							</div>
							<div class="form-group">
								<label for = "place">Place:</label>
								<input type = "text" class="form-control" id="place" name = "place"/>
							</div>
							<div class="form-group">
								<label for = "coordinates">Coordinates:</label>
								<input type = "text" class="form-control" id="coordinates" name = "coordinates"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Owner Details
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "ownerid">Owner ID:</label>
								<input type = "text" class="form-control" id="ownerid" name = "ownerid"/>
							</div>
							<div class="form-group">
								<label for = "ownername">Owner name:</label>
								<input type = "text" class="form-control" id="ownername" name = "ownername"/>
							</div>
							<div class="form-group">
								<label for = "contactno">Contact number:</label>
								<input type = "text" class="form-control" id="contact" name = "contact"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Insert Bus Schedule
							<span class="caret"></span></a>
							<form action = "Insert.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "bus">Bus ID:</label>
								<input type = "text" class="form-control" id="bus" name = "bus"/>
							</div>
							<div class="form-group">
								<label for = "busstop">Bus-Stop ID:</label>
								<input type = "text" class="form-control" id="busstop" name = "busstop"/>
							</div>
							<div class="form-group">
								<label for = "arrival">Arrival:</label>
								<input type = "text" class="form-control" id="arrival" name = "arrival"/>
							</div>
							<div class="form-group">
								<label for = "departure">Departure:</label>
								<input type = "text" class="form-control" id="departure" name = "departure"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
			</ul>
		</div>
		</nav> 
	</body>
</html>