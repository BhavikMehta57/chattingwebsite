<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		$password1 = check_input($_POST["password1"]);
		$password2 = check_input($_POST["password2"]);
		$ans1 = check_input($_POST["ans1"]);
		$ans2 = check_input($_POST["ans2"]);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) 
		{
			header('location: index.php?error=invalidusername');
			exit();
		}
		else if ($password1 !== $password2) 
		{ 
			header('location: index.php?error=passdonotmatch');
			exit();
		}
		else
		{
			{
				$user = mysqli_query($conn,"select username from user where username='$username'");
				$row = mysqli_fetch_array($user);
				if($row == NULL)
				{

					$fusername=$username;
					
					$password = check_input($_POST["password1"]);
					$fpassword=md5($password);
					
					mysqli_query($conn,"insert into `user` (username, password, ans1, ans2, access) values ('$fusername', '$fpassword','$ans1', '$ans2', '2')");
					 
					header('location: index.php?signup=success');
				}
				else
				{
					header('location: index.php?error=alreadytaken');
					exit();
				}
			}
		}
	}
?>