<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel = "stylesheet" href = "TorChatLoginPage.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<h1 align="center" style="color: #22282E">Anonymous Chatting System</h1>      
			</div>
		</div>
		<div class="col-sm-6">
			<div class="modal-dialog">
				<div class="main-section">
					<div class="modal-content">
						<div class="user-img">
							<img src="userimg.png" class="img-circle">
						</div>
						<div class="form-input">
							<h3 style="color: black">LOG IN</h3>
							<form action="phpfiles/login.php" method="post">
								<div class="form-group">
									<input type="Email" name="email" class="form-control" placeholder="Email ID">
								</div>
								<div class="form-group">
									<input id="passinput" name="password" type="password" class="form-control" placeholder="Password">
								</div>
								<input type="checkbox" onclick="viewpass()"> Show Password
								<script>
									function viewpass() 
									{
					  					var x = document.getElementById("passinput");
					  					if (x.type === "password") 
					  					{
					    					x.type = "text";
					  					} 
					  					else 
					  					{
					    					x.type = "password";
					  					}
									}
								</script>
								<br><button type="submit" name="login" class="btn btn-success btn-lg">Log In</button>
								<?php
							if(isset($_GET['error']))
							{
								if($_GET['error'] == "emptyfieldss")
								{
									echo '<p style="color: red">FILL IN ALL THE FIELDS</p>';
								}
								else if($_GET['error'] == "wrongpassword")
								{
									echo '<p style="color: red">INCORRECT PASSWORD</p>';
								}
								else if($_GET['error'] == "nouserfound")
								{
									echo '<p style="color: red">ACCOUNT WITH THIS EMAIL DOESNT EXIST</p>';
								}
							}							
							?>
							</form>
						</div>
						<div class="forgot">
							<a href='#'>Forgot Password ?</a>
							<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="modal-dialog">
				<div class="main-section">
					<div class="modal-content">
						<div class="user-img">
							<img src="userimg.png" class="img-circle">
						</div>
						<div class="form-input">
							<h3 style="color: black">SIGNUP</h3>
							<?php
							if(isset($_GET['error']))
							{
								if($_GET['error'] == "emptyfields")
								{
									echo '<p style="color: red">FILL IN ALL THE FIELDS</p>';
								}
								else if($_GET['error'] == "invalidemail")
								{
									echo '<p style="color: red">INVALID EMAIL</p>';
								}
								else if($_GET['error'] == "invalidusername")
								{
									echo '<p style="color: red">INVALID USERNAME</p>';
								}
								else if($_GET['error'] == "passwordsdonotmatch")
								{
									echo '<p style="color: red">PASSWORDS DO NOT MATCH</p>';
								}
								else if($_GET['error'] == "alreadytaken")
								{
									echo '<p style="color: red">EMAIL-ID/USERNAME ALREADY IN USE</p>';
								}
							}
							else if(isset($_GET['signup']))
							{
								if($_GET['signup'] == "success")
								{
									echo '<h2 style="color: green">REGISTRATION SUCCESSFUL !!!</h2>';
								}
							}							
							?>													
							<form action="phpfiles/data.php" method="post">
								<div class="form-group1">
									<input id="email" name="email" type="Email" class="form-control" placeholder="Email ID">
								</div>
								<div class="form-group1">
									<input id="username" name="username" type="Username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group1">
									<input id="passinput1" name="password1" type="Password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group1">
									<input id="passinput2" name="password2" type="Password" class="form-control" placeholder="Re-Enter Password">
								</div>
								<input type="checkbox" onclick="viewpass1()"> Show Passwords
								<script>
									function viewpass1() 
									{
					  					var x = document.getElementById("passinput1");
					  					if (x.type === "password") 
					  					{
					    					x.type = "text";
					  					} 
					  					else 
					  					{
					    					x.type = "password";
					  					}
					  					var x = document.getElementById("passinput2");
					  					if (x.type === "password") 
					  					{
					    					x.type = "text";
					  					} 
					  					else 
					  					{
					    					x.type = "password";
					  					}
									}
								</script>
								<br>
								<button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>
