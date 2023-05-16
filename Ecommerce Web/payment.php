<?php
	include('connect.php');
	include('header_footer.php');
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
	</head>
	<body>
		<?php
			my_header();
		?>
		<?php
			$prod=$_GET['prod'];
			$price=mysqli_fetch_assoc(mysqli_query($con,"select PRICE from `products` where ID = $prod"))['PRICE'];
			$quan=$_GET['quan'];
			$amt = $price*$quan+50;
		?>
		<section class="sections">
			<form method="post" action="">
				<section class="form-sect">
					<label for="crd">Card Number</label><br/>
					<input type="text" id="crd" name="crd" placeholder="Card Number" required="required" pattern="[1-9]{1}[0-9]{11}"/>
				</section>
				<section class="form-sect">
					<label for="cvv">CVV Number</label><br/>
					<input type="text" id="cvv" name="cvv" placeholder="CVV Number" required="required" pattern="[1-9]{1}[0-9]{2}"/>
				</section>
				<section class="form-sect">
					<label for="pin">Pin Number</label><br/>
					<input type="password" id="pin" name="pin" placeholder="PIN" required="required" pattern="[0-9]{4}"/>
				</section>
				<section class="submit">
					<input type="submit" value="pay <?php echo $amt; ?>" name="pay_amt"/>
				</section>
			</form>
		</section>
		<?php
			if(isset($_POST['pay_amt'])){
				$query = "insert into `orders`(PHONE_NO,PRODUCT_ID,QUANTITY,DATE,STATUS) values('".$_SESSION['phone']."',$prod,$quan,now(),'Paid')";
				if(mysqli_query($con,$query)){
					echo "<script>alert('The product ordered successfully!');</script>";
					echo "<script>window.open('dashboard.php','_self');</script>";
				}
			}
		?>
		<?php
			my_footer();
		?>
		<script src="mom-made.js"></script>
	</body>
</html>