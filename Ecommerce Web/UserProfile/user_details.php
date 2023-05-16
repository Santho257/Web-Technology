<?php
	include("connect.php");
	$id=$_SESSION['phone'];
	$select = "select * from `users` where PHONE_NO=$id";
	$res = mysqli_query($con,$select);
	$row = mysqli_fetch_assoc($res);
	$name = $row['NAME'];
	$address = $row['ADDRESS'];
	$image = $row['IMAGE'];
	$password = $row['PASSWORD'];
	$email = $row['EMAIL'];
?>