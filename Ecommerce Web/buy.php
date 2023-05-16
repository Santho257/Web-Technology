<?php
	include('functions.php');
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
			if(!isset($_SESSION['phone'])){
				echo "<script>alert('login and then buy')</script>";
				echo "<script>window.open('login.php','_self');</script>";
			}
		?>
		<main>
			<section id='shop'>
				<?php
					buy_details();
				?>
			</section>
		</main>
		<?php
			my_footer();
		?>
		<script src="mom-made.js"></script>
	</body>
</html>