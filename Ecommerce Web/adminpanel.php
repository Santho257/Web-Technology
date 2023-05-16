<?php
	include "header_footer.php";
	include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Dashboard</title>
		<link rel="website icon" type="png" href="img/logo.png">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="mom-made.css">
		<style>
			footer{
				position: absolute;
				width: 100%;
				bottom: 0;
			}
		</style>
	</head>
	<body>
		<?php
			my_header();
		?>
		<?php
			if(isset($_GET['delete_category'])){
				$id = $_GET['delete_category'];
				$cats = "delete from categories where ID=$id";
				$res = mysqli_query($con,$cats);
				if($res){
					echo "<script>alert('Category Deleted Successfully!')</script>";
					echo "<script>window.open('adminpanel.php?view_cat','_self')</script>";
				}
			}
			if(isset($_GET['delete_product'])){
				$id = $_GET['delete_product'];
				$res = mysqli_query($con,"select TITLE,IMAGE1,IMAGE2,IMAGE3 from products where ID=$id");
				if($res){
					$row=mysqli_fetch_assoc($res);
					$title=$row["TITLE"];
					for($i=1;$i<4;$i++){
						$img=$row["IMAGE$i"];
						unlink("adminpanel/images/$title/$img");
					}
					rmdir("adminpanel/images/$title");
					/* $img2=$row['IMAGE2'];
					$img3=$row['IMAGE3']; */
				}
				$cats = "delete from products where ID=$id";
				$res = mysqli_query($con,$cats);
				if($res){
					echo "<script>alert('Product Deleted Successfully!')</script>";
					// echo "<script>window.open('adminpanel.php?view_prod','_self')</script>";
				}
			}
			if(isset($_GET['change_status'])){
				$id = $_GET['change_status'];
				$cats = "update orders set STATUS='Packed' where ORDER_ID=$id";
				$res = mysqli_query($con,$cats);
				if($res){
					echo "<script>window.open('adminpanel.php?view_ordrs','_self')</script>";
				}
			}
		?>
	
		<main>
			<section id="shop">
				<section class="sections" style="width: 100% padding: 0; margin: 0;" id="categories">
					<h5 class="tittle">Menu</h5>
					<nav>
						<ul>
							<a href="adminpanel.php?add_cat"><li>Add Category</li></a>
							<a href="adminpanel.php?view_cat"><li>Edit Category</li></a>
							<a href="adminpanel.php?add_pro"><li>Add Product</li></a>
							<a href="adminpanel.php?view_prod"><li>Edit Product</li></a>
							<a href="adminpanel.php?view_ordrs"><li>View Orders</li></a>
							<a href="logout.php"><li>Log Out</li></a>
						</ul>
					</nav>
				</section>
				<section id="items">
					<?php
						if(isset($_GET['add_cat'])){
							include('adminpanel/add category.php');
						}
						else if(isset($_GET['add_pro'])){
							include('adminpanel/add product.php');
						}
						else if(isset($_GET['view_cat'])){
							include('adminpanel/view category.php');
						}
						else if(isset($_GET['view_prod'])){
							include('adminpanel/view product.php');
						}
						else if(isset($_GET['view_ordrs'])){
							include('adminpanel/view orders.php');
						}
						if(isset($_GET['edit_category'])){
							$id=$_GET['edit_category'];
							include("adminpanel/edit category.php");
						}
						if(isset($_GET['edit_prod'])){
							$id=$_GET['edit_prod'];
							include("adminpanel/edit product.php");
						}
					?>
				</section>
			</section>
		</main>
		<?php
			my_footer();
		?>
		<script src="mom-made.js"></script>
	</body>
</html>