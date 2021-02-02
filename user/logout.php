<?php
	session_start();
	include('../conn.php');
	mysqli_query($conn,"delete from `user` where userid='".$_SESSION['id']."'");
	session_destroy();
	header('location:../userlogin.php');
?>