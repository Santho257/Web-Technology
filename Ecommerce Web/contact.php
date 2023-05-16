<?php
	include("header_footer.php")
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="website icon" type="png" href="img/logo.png">
	<link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="mom-made.css">
	</head>
	<body>
		<!-- Navigation -->
		<?php
			my_header();
		?>
		
		<section class="sections" id="contact">
			<h3 class="title">Contact Us</h3>
			<section id="flex">
				<section>
					<form>
						<input type="text" tabindex="-1" placeholder="Name" id="name" pattern="[a-zA-z]+" required />
						<input type="email" placeholder="E-mail" id="email" pattern="[a-zA-z0-9.]+@[a-zA-z]+.[a-z]{2,}" required />
						<input type="tel" placeholder="Mobile Number" id="phn" pattern="[6789]{1}[0-9]{9}" required />
						<textarea type="textarea" placeholder="Message" rows="5" id="message" required ></textarea>
						<a  href="#"><button type="submit">SEND</button></a>
					</form>
				</section>
				<section>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3911.602693813286!2d77.82575646245877!3d11.363703236569421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba964016c607823%3A0x580736a65c2b0005!2sK.%20S.%20Rangasamy%20College%20of%20Technology!5e0!3m2!1sen!2sin!4v1677992588362!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" ></iframe>
				</section>
			</section>
		</section>
		
		<?php
			my_footer();
		?>
		
	</body>
</html>