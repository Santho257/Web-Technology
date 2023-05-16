<?php
	include('connect.php');
	session_start();
	if(!isset($_SESSION['phone'])){
		echo "<script>alert('login and then buy')</script>";
		echo "<script>window.open('login.php','_self');</script>";
	}
	else{
		$id=$_GET['prod'];
		$phone = $_SESSION['phone'];
		$res = mysqli_query($con,"insert into `cart` value('$phone',$id)");
		if($res){
			echo "<script>alert('product added to cart')</script>";
			echo "<script>window.open('cart.php','_self')</script>";
		}
	}
?>