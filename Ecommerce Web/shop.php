<?php
	include('header_footer.php');
	include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="website icon" type="png" href="img/logo.png">
	<link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="mom-made.css">
	</head>
	<body>
		<!-- Navigation -->
		<?php
			my_header();
		?>
		</header>
		
		<section id="shop">
			<section class="sections" style="width: 100%" id="categories">
				<h5 class="tittle">Categories</h5>
				<nav>
					<ul>
						<?php
							categories();
						?>
					</ul>
				</nav>
			</section>
			<section id="items">
				<section class="sections grid grid-3" id="cosmetics">
					<h3 class="title">Products</h3>
					<section class="products">
						<?php
							show_products();
						?>
					</section>
				</section>
			</section>
		</section>
		
		<?php
			my_footer();
		?>
		
		<script src="mom-made.js"></script>
	</body>
</html>
		