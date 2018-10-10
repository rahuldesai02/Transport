<!DOCTYPE html>
<html>
	<head>
		<title>
			Transport DBMS
		</title>
		<style>
			body{
				margin:auto;
				text-align:center;
			}
			h1{
				color:blue;
			}
			div{
				display:none;
				margin:auto;
				padding-left:50px;
				text-align:left;
			}
		</style>
		<script>
			function insertBus(){
				document.getElementById("insertDriver").style.display = "none";
				document.getElementById("insertConductor").style.display = "none";
				document.getElementById("insertBusStop").style.display = "none";
				document.getElementById("insertBus").style.display = "block";
				document.getElementById("insertOwner").style.display = "none";
				
			}
			function insertDriver(){
				document.getElementById("insertConductor").style.display = "none";
				document.getElementById("insertBusStop").style.display = "none";
				document.getElementById("insertBus").style.display = "none";
				document.getElementById("insertOwner").style.display = "none";
				document.getElementById("insertDriver").style.display = "block";
			}
			function insertConductor(){
				document.getElementById("insertBusStop").style.display = "none";
				document.getElementById("insertBus").style.display = "none";
				document.getElementById("insertDriver").style.display = "none";
				document.getElementById("insertOwner").style.display = "none";
				document.getElementById("insertConductor").style.display = "block";
			}
			function insertBusStop(){
				document.getElementById("insertBus").style.display = "none";
				document.getElementById("insertDriver").style.display = "none";
				document.getElementById("insertConductor").style.display = "none";
				document.getElementById("insertOwner").style.display = "none";
				document.getElementById("insertBusStop").style.display = "block";
			}
			function insertOwner(){
				document.getElementById("insertBus").style.display = "none";
				document.getElementById("insertDriver").style.display = "none";
				document.getElementById("insertConductor").style.display = "none";
				document.getElementById("insertBusStop").style.display = "none";
				document.getElementById("insertOwner").style.display = "block";
			}
		</script>
	</head>
	<body>
		<h1>TRANSPORT DBMS</h1>
		<button type = "button" onclick = "insertBus()">Click here to insert bus information</button>
		<button type = "button" onclick = "insertDriver()">Click here to insert driver information</button>
		<button type = "button" onclick = "insertConductor()">Click here to insert conductor information</button>
		<button type = "button" onclick = "insertBusStop()">Click here to insert bus stop information</button>
		<button type = "button" onclick = "insertOwner()">Click here to insert Owner information</button>
		<div id = "insertBus">
		<h1>Enter Bus Details</h1>
		<form action="InsertBus.php" method="post">
			Bus ID:<input type="text" name="busid"/><br><br>
			Bus Name:<input type="text" name="busname"/><br><br>
			Registration No:<input type="text" name="regno"/><br><br>
			Bus Manufacturer:<input type="text" name="busmanufacturer"/><br><br>
			Bus Color:<input type="text" name="buscolour"/><br><br>
			Driver ID:<input type="text" name="driverid"/><br><br>
			Conductor ID:<input type="text" name="conductorid"/><br><br>
			Owner ID:<input type="text" name="ownerid"><br><br>
			<input type="Submit"/>
		</form>
		</div>
		<div id = "insertDriver">
		<h1>Enter Driver Details</h1>
		<form action="InsertDriver.php" method="post">
			Driver ID:<input type="text" name="driverid"/><br><br>
			Driver Name:<input type="text" name="drivername"/><br><br>
			Contact No:<input type="text" name="contactno"/><br><br>
			Salary:<input type="text" name="salary"/><br><br>
			License No:<input type="text" name="license"/><br><br>
			<input type="Submit"/>
		</form>
		</div>
		<div id = "insertConductor">
		<h1>Enter Conductor Details</h1>
		<form action="InsertConductor.php" method="post">
			Conductor ID:<input type="text" name="conductorid"/><br><br>
			Conductor Name:<input type="text" name="conductorname"/><br><br>
			Contact No:<input type="text" name="contactno"/><br><br>
			Salary:<input type="text" name="salary"/><br><br>
			<input type="Submit"/>
		</form>
		</div>
		<div id = "insertBusStop">
		<h1>Enter Bus Stop Details</h1>
		<form action="InsertBusStop.php" method="post">
			Bus_Stop_ID:<input type="text" name="busstopid"/><br><br>
			Place:<input type="text" name="place"/><br><br>
			Coordinates:<input type="text" name="coordinates"/><br><br>
			<input type="Submit"/>
		</form>
		</div>
		<div id = "insertOwner">
		<h1>Enter Owner Details</h1>
		<form action="InsertOwner.php" method="post">
			Owner_ID:<input type="text" name="ownerid"/><br><br>
			Name:<input type="text" name="ownername"/><br><br>
			Contact No:<input type="text" name="contactno"/><br><br>
			<input type="Submit"/>
		</form>
		</div>
	</body>
</html>
