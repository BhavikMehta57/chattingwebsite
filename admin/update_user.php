<?php
	include('session.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$username=$_POST['username'];
		
		mysqli_query($conn,"update `user` set username='$username' where userid='$id'");
	}

?>