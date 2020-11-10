<?php
	if (isset($_POST['login']))
	{
		require 'dbh.php';
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($email) || empty($password))
		{
			header("Location: ../TorChatLoginPage.php?error=emptyfieldss");
			exit();
		}
		else
		{
			$sql ="SELECT * FROM user WHERE Email= ?;";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../TorChatLoginPage.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"s",$email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result))
				{
					$pwdcheck = password_verify($password,$row['Password']);
					if($password != $row['Password'])
					{
						header("Location: ../TorChatLoginPage.php?error=wrongpassword");
						exit();
					}
					else if($password == $row['Password'])
					{
						session_start();
						$_SESSION['UserID']=$row['User_ID'];
						$_SESSION['Username']=$row['Username'];
						header("Location: ../mainwebpage.php");
						exit();
					}
					else
					{
						header("Location: ../TorChatLoginPage.php?error=wrongpassword");
						exit();
					}
				}
				else
				{
					header("Location: ../TorChatLoginPage.php?error=nouserfound");
					exit();
				}
			}
		}
	}
	else
	{
		header("Location: ../TorChatLoginPage.php");
		exit();
	}
?>