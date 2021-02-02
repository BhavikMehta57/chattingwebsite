<!DOCTYPE html>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel = "stylesheet" href = "LoginPage.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand">Anonymous Chatting System</p>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="userlogin.php">User Login</a></li>
					<li><a href="adminlogin.php">Admin Login</a></li>
				</ul>
			</div>
		</nav>
		<div class=".col-xs-12 .col-sm-12 .col-md-6 .col-lg-6 .col-xl-6">
			<div class="modal-dialog">
				<div class="main-section">
					<div class="modal-content">
						<div class="user-img">
							<img src="userimg.png" class="img-circle">
						</div>
						<div class="form-input">
							<h3 style="color: black">LOG IN</h3>
							<form action="ulogin.php" method="post">
								<div class="form-group">
									<input type="Username" name="username" class="form-control" placeholder="Username" required>
								</div>	
								<br><button type="submit" name="login" class="btn btn-success btn-lg">Log In   <span class="glyphicon glyphicon-log-in"></span></button>
							</form>
							<?php
								if(isset($_GET['error']))
								{
									if($_GET['error'] == "userexists")
									{
										echo '<p style="color: red">USERNAME NOT AVAILABLE</p>';
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>