<?php
	session_start();
	if(isset($_SESSION['phone'])){
		session_unset();
		session_destroy();
		echo "<script>window.open('shop.php','_self')</script>";
	}
?>