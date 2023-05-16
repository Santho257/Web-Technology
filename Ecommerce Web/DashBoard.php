<?php
	include "header_footer.php";
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
		<main>
			<section id="shop">
				<section class="sections" style="width: 100% padding: 0; margin: 0;" id="categories">
					<h5 class="tittle">Menu</h5>
					<nav>
						<ul>
							<a href="Dashboard.php?profile"><li>My Profile</li></a>
							<a href="Dashboard.php?change_pass"><li>Change Password</li></a>
							<a href="Dashboard.php?orders"><li>My Orders</li></a>
							<a href="logout.php"><li>Log Out</li></a>
						</ul>
					</nav>
				</section>
				<section id="items">
					<?php
						if(isset($_GET['profile'])){
							include('UserProfile/profile.php');
						}
						else if(isset($_GET['orders'])){
							include('UserProfile/orders.php');
						}
						else if(isset($_GET['change_pass'])){
							include('UserProfile/change password.php');
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