<?php
	echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
	echo '<script src="js/jquery-3.3.1.min.js"></script>';
	echo '<script src="js/bootstrap.min.js"></script>';
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Transport DBMS
		</title>
	</head>
	<body class = "container-fluid" background = "bg.jpg">
		<h1>TRANSPORT DBMS</h1>
		<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Welcome</a>
			</div>
			<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle text-center " data-toggle="dropdown" href="#">Administrator
							<span class="caret"></span></a>
							<form action = "Admin.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "username">Username:</label>
								<input type = "text" class="form-control" id="email"  placeholder="Enter username" name = "adminuname"/>
							</div>
							<div class="form-group">
								<label for = "pwd">Password:</label>
								<input type = "password" class="form-control" placeholder="Enter password" id="pwd" name = "adminpassword"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center" data-toggle="dropdown" href="#">Customer Login
							<span class="caret"></span></a>
							<form action = "Login.php" class = "dropdown-menu" method="post">
							<div class="form-group">
								<label for = "username">Username:</label>
								<input type = "text" class="form-control" id="username"  placeholder="Enter username" name = "useruname"/>
							</div>
							<div class="form-group">
								<label for = "pwd" >Password:</label>
								<input type = "password" class="form-control" id="pwd" placeholder="Enter password" name = "userpassword"/>
							</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle text-center" data-toggle="dropdown" href="#">Customer Sign-Up
							<span class="caret"></span></a>
							<form action = "SignUp.php" class = "dropdown-menu" method="post">
								<div class="form-group">
								<label for = "username">Create Username:</label>
								<input type = "text" class="form-control" id="username"  placeholder="Enter username" name = "newname"/>
								</div>
								<div class="form-group">
								<label for = "pwd" >Create Password:</label>
								<input type = "password" class="form-control" id="pwd" placeholder="Enter password" name = "newpassword"/>
								</div>
								<div class="form-group">
								<label for = "pwd" >Confirm Pasword:</label>
								<input type = "password" class="form-control" id="pwd" placeholder="Enter password" name = "confirmpassword"/>
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
								
							</form>
					</li>
					
			</ul>
		</div>
		</nav> 
	</body>
</html>