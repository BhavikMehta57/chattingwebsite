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
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) 
		{
			?><script>
					window.alert('Username should not contain space and special characters!');
					window.location.href='userlogin.php';
			</script>
			<?php
		}
		else
		{
				
			$fusername=$username;
			
			$query=mysqli_query($conn,"select * from `user` where username='$fusername'");
			
			if(mysqli_num_rows($query)==0)
			{
					mysqli_query($conn,"insert into `user` (username, access) values ('$fusername','2')");
					$q=mysqli_query($conn,"select * from `user` where username='$fusername'");
					$row=mysqli_fetch_array($q);
					$_SESSION['id']=$row['userid'];
					?>
					<script>
						window.alert('Login Success, Welcome User!');
						window.location.href='user/';
					</script>
					<?php
			}
			else
			{
				header('location: userlogin.php?error=userexists');
				exit();
			}
		}
	}
?>