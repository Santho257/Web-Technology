<?php
	function my_header(){
		echo "<header>
			<section>
				<a href='#'><img src='img/logo.png' alt='' /></a>
				<p>Mom Made <span>Organics</span></p>
			</section>
			<nav>
				<ul>
					<li><a href='home.php'>Home</a></li>
					<li><a href='shop.php'>Shop</a></li>
					<li><a href='#'>Blog</a></li>
					<!-- <li><a href='#'>About</a></li> -->
					<li><a href='contact.php'>Contact</a></li>";
		session_start();
		if(isset($_SESSION['phone'])){
			if($_SESSION['phone']!='8754086257'){
				echo "<li><a href='cart.php'><i class='fa-solid fa-bag-shopping'></i></a></li>";
				echo "<li><a href='dashboard.php'><i class='fa-solid fa-user'></i></a></li>";
			}
			else
				echo "<li><a href='adminpanel.php'><i class='fa-solid fa-user'></i></a></li>";
		}else{
			echo "<li><a href='login.php'><i class='fa-solid fa-bag-shopping'></i></a></li>";
			echo "<li><a href='login.php'><i class='fa-solid fa-user'></i></a></li>";
		}
		echo	"</ul>
			</nav>
		</header>";
	}
	function my_footer(){
		echo "<footer style='padding: 10px 0;'>
			<ul>
				<li><i class='fa-brands fa-instagram'></i></li>
				<li><i class='fa-brands fa-facebook'></i></li>
				<li><i class='fa-brands fa-linkedin'></i></li>
				<li><i class='fa-brands fa-twitter'></i></li>
				<li><i class='fa-brands fa-youtube'></i></li>
			</ul>
			<p>&copy;Copyright. Designed by Favicons! KSRCT</p>
		</footer>";
	}
?>