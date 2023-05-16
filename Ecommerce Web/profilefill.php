<?php 
	include('header_footer.php');
	include('connect.php');
	session_start();
?>
<?php
	if(isset($_POST['upd_prof'])){
			$phn = $_SESSION['phone'];
			$update = "update `users` set NAME='".$_POST['name']."',ADDRESS='".$_POST['adrs']."',STATUS=1";
			if($_FILES['prof']['name']!=null){
				$img = $_FILES['prof']['name'];
				$img_tem = $_FILES['prof']['tmp_name'];
				mkdir("userprofile\\$phn");
				move_uploaded_file($img_tem,"userprofile\\$phn\\$img");
				$update = $update.",IMAGE='$img'";
			}
			$update = $update." where PHONE_NO='$phn'";
			$res = mysqli_query($con,$update);
			if($res){
				echo "<script>window.open('dashboard.php','_self')</script>";
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="website icon" type="png" href="img/logo.png">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="mom-made.css">
    </head>
    <body>
        <!-- Navigation -->
		<header>
			<section>
				<a href='#'><img src='img/logo.png' alt='' /></a>
				<p>Mom Made <span>Organics</span></p>
			</section>
		</header>
		<section class="sections">
			<h3 class="title">Profile</h3>
			<img style="width: 150px; height: 150px; " src="img/logo.png"/>
			<form method="post" action="" enctype="multipart/form-data" style="display: flex; align-items: center; flex-direction: column;">
				<section style="width: 60%;" class="form-sect">
					<label for="name">Name</label><br/>
					<input type="text" id="name" name="name" placeholder="Name" required="required"/>
				</section>
				<section style="width: 60%;" class="form-sect">
					<label for="adrs">Address</label><br/>
					<input type="text" id="adrs" name="adrs" placeholder="Address" required="required"/>
				</section>
				<section style="width: 60%;" class="form-sect">
					<label for="prof">Profile Image<span style="font-size: 0.7em;color: grey;">(Optional)</span></label><br/>
					<input type="file" id="prof" name="prof"/>
				</section>
				<section class="submit">
					<input type="submit" value="Update Profile" name="upd_prof"/>
				</section>
			</form>
		</section>
		<?php
			my_footer();
		?>

        <script src="mom-made.js"></script>
    </body>
</html>