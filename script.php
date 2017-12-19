<?php
 
if(isset($_SESSION['tps'] )){
	if(time()<($_SESSION['tps'] + $_SESSION['time'])){
		session_destroy();
		//header("Location: ".URL_BO."/identification.php");
		echo '<script language="javascript" type="text/javascript">window.location.replace("index.php?page=2");</script>';
	}
	else{
	$_SESSION['time'] = time();
	}
}
?>