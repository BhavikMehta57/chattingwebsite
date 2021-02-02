<?php
	session_start();
	include('../conn.php');
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}
	
	$sq=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
		
	if ($srow['access']!=1){
		header('location:../');
		exit();
	}
	
	$user=$srow['username'];

	if (!empty($_SERVER['HTTP_CLIENT_IP']))   
	{
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from proxy
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	{
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from remote address
	else
	{
		$ip_address = $_SERVER['REMOTE_ADDR'];
	}	
	mysqli_query($conn,"update `user` set ip_address='$ip_address' where userid='".$_SESSION['id']."'");


	if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    	$resolution = '' . $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
	    mysqli_query($conn,"update `user` set screen_resolution='$resolution' where userid='".$_SESSION['id']."'");
	} 
	else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) 
	{
	    $_SESSION['screen_width'] = $_REQUEST['width'];
	    $_SESSION['screen_height'] = $_REQUEST['height'];
	    $resolution = '' . $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
	    mysqli_query($conn,"update `user` set screen_resolution='$resolution' where userid='".$_SESSION['id']."'");
	} 
	else 
	{
	    echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
	}
?>