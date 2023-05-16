<?php
	include("header_footer.php");
	include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom-made Products</title>
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
			if(isset($_GET['delete'])){
				$phn=$_SESSION['phone'];
				$id=$_GET['delete'];
				$query="delete from cart where PHONE_NO = $phn and PRODUCT_ID = $id";
				$res=mysqli_query($query);
				if($res){
					echo "<script>alert('Element Removed From the cart');</script>";
				}
			}
		?>
		<section class="sections">
			<h3 class="title">Cart</h3>
			<table class="view-table" style="width: 100%;">
				<thead>
					<th>S.No</th>
					<th>Product</th>
					<th>Image</th>
					<th>Description</th>
					<th>Buy</th>
					<th>Remove</th>
				</thead>
				<?php
					$usr = $_SESSION['phone'];
					$res = mysqli_query($con,"select PRODUCT_ID from cart where PHONE_NO = $usr");
					$i = 1;
					while($row1=mysqli_fetch_assoc($res)){
						$id = $row1['PRODUCT_ID'];
						$cats ="select TITLE,DESCRIPTION,IMAGE1 from `products` where ID=$id";
						$res1 = mysqli_query($con,$cats);
						$row=mysqli_fetch_assoc($res1);
						$title=$row['TITLE'];
						$image=$row['IMAGE1'];
						$desc=$row['DESCRIPTION'];
						echo "<tr>
								<td>$i</td>
								<td>$title</td>
								<td align='center'><img  class='tab-image' src='adminpanel/images//$title//$image' alt='Product Image'/></td>
								<td>$desc</td>
								<td><a href='product_desc.php?id=$id'><i class='fa-solid fa-money-bill'  style='color: green; font-size: 40px;'></i></a></td>
								<td><a href='cart.php?delete=$id'><i class='fa-solid fa-trash' style='color: red;'></i></a></td>
							</tr>";
						$i++;
					}
				?>
			</table>
		</section>
		<?php
			my_footer();
		?>
		<script src="mom-made.js"></script>
	</body>
</html>