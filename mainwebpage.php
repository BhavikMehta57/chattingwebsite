<?php
	session_start();
?>
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
							<form action="phpfiles/logout.php" method="post">
								<br><button type="submit" name="logout" class="btn btn-success btn-lg">Log Out</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>