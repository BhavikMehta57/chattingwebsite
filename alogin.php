<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		{	
			$password = check_input($_POST["password"]);
			$fpassword=md5($password);
			
			$query=mysqli_query($conn,"select * from `user` where password='$fpassword'");
		
			if(mysqli_num_rows($query)==1)
			{
				
				$row=mysqli_fetch_array($query);
				$_SESSION['id']=$row['userid'];
				?>
				<script>
					window.alert('Login Success, Welcome Admin!');
					window.location.href='admin/';
				</script>
				<?php
			}	
		}
	}
?>