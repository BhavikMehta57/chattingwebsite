<?php
	if (isset($_POST['submit']))
	{
		require 'dbh.php';
		
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		
		if(empty($email) || empty($username) || empty($password1) || empty($password2))
		{
			header("Location: ../TorChatLoginPage.php?error=emptyfields&email=".$email."&username=".$username);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			header("Location: ../TorChatLoginPage.php?error=invalidemail&username=".$username);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
		{
			header("Location: ../TorChatLoginPage.php?error=invlaidusername&email=".$email);
			exit();
		}
		else if($password1 !== $password2)
		{
			header("Location: ../TorChatLoginPage.php?error=passwordsdonotmatch&email=".$email."&username=".$username);
			exit();
		}
		else
		{
			$sql="SELECT Username FROM user WHERE Email=? OR Username=?;";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../TorChatLoginPage.php?error=error404");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"ss",$email,$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0)
				{
					header("Location: ../TorChatLoginPage.php?error=alreadytaken");
					exit();
				}
				else
				{
					$sql="INSERT into user(Email,Username,Password) VALUES (?,?,?)";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql))
					{
						header("Location: ../TorChatLoginPage.php?error=error404");
						exit();
					}
					else
					{
						$hashedpwd = password_hash($password1, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,"sss",$email,$username,$password1);
						mysqli_stmt_execute($stmt);
						header("Location: ../TorChatLoginPage.php?signup=success");
						exit();	
					}					
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else
	{
		header("Location: ../TorChatLoginPage.php");
		exit();
	}
?>

	
