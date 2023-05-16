<?php
	include("header_footer.php");
	include("connect.php");
	if(isset($_POST['sign_up'])){
		$ph_no = $_POST['phn-num'];
		$already = "select * from `users` where PHONE_NO = $ph_no";
		$res = mysqli_query($con,$already);
		$rows = mysqli_num_rows($res);
		if($rows>0){
			echo "<script>
					document.getElementById('error1').innerHTML='User Already Exists';
				</script>";
			exit();
		}
		$email = $_POST['mail'];
		$password = $_POST['pass'];
		$repass = $_POST['re-pass'];
		if($password!=$repass){
			echo "<script>
					document.getElementById('error1').innerHTML='Password DoesNot Match';
				</script>";
		}
		else{
			$hash = password_hash($password,PASSWORD_DEFAULT);
			$insert = "insert into `users`(PHONE_NO,EMAIL,PASSWORD) values('$ph_no','$email','$hash')";
			$res = mysqli_query($con,$insert);
			session_start();
			$_SESSION['phone']=$ph_no;
			if($res){
				echo "<script>alert('Thanks for registration');
						window.open('profilefill.php','_self');
						</script>";
			}
		}
	}
	if(isset($_POST['log_in'])){
		$ph_no = $_POST['phn'];
		$already = "select * from `users` where PHONE_NO = $ph_no";
		$res = mysqli_query($con,$already);
		$num = mysqli_num_rows($res);
		if($num==0){
			echo "<script>
					window.open('login.php','_self');
					document.getElementById('error2').innerHTML='User does not Exists';
				</script>";
			exit();
		}	
		$rows=mysqli_fetch_assoc($res);
		$hashed=$rows['PASSWORD'];
		$password = $_POST['passwd'];
		if(!password_verify($password,$hashed)){
			echo "<script>
					window.open('login.php','_self');
					error=document.getElementById('error2');
					error.innerHTML='Phone number or password is incorrect';
				</script>";
		}
		else{
			session_start();
			$_SESSION['phone']=$ph_no;
			if($ph_no!='8754086257')
				echo "<script>window.open('dashboard.php','_self')</script>";
			else
				echo "<script>window.open('adminpanel.php','_self')</script>";
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
		<?php
			my_header();
		?>
        <section id="bg">
        <section id="login" align="center">
            <h3 id="log-title">Log In / <span id="status">Sign-In</span></h3>
            <section id="sign-up">
                <form method="post" action="">
					<h4 id="error1" style="color: red;"></h4>
                    <table>
                        <tr><td class="label">Phone Num</td><td><input type="tel" name="phn-num" id="phn_num" pattern="[1-9]{1}[0-9]{9}" required="required"/></td></tr>
                        <tr><td class="label">E-mail</td><td><input type="email" name="mail" id="mail" required="required" Pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}"/></td></tr>
                        <tr><td class="label">Password</td><td><input type="password" name="pass" id="pass" required="required" /></td></tr>
                        <tr><td class="label">Re-Enter Password</td><td><input type="password" name="re-pass" id="re-pass" required="required"/></td></tr>
                    </table>
                    <section class="submit">
						<input type="submit" value="Sign Up" name="sign_up"/>
					</section>
                </form>
            </section>
            <section id="sign-in">
                <form method="post" action="">
					<h4 id="error1" style="color: red;"></h4>
                    <table>
                        <tr><td class="label">Phone Num</td><td><input type="tel" name="phn" id="phn" required="required"/></td></tr>
                        <tr><td class="label">Password</td><td><input type="password" name="passwd" id="passwd" required="required"/></td></tr>
                    </table>
                    <section class="submit">
						<input type="submit" value="Log In" name="log_in"/>
					</section>
                </form>
            </section>
            <section id="choice">
                <button onclick="login(0)">To Sign-Up</button>
                <button onclick="login(1)">To Sign-In</button>
            </section>
        </section>
        </section>

        <?php
			my_footer();
		?>

        <script src="mom-made.js"></script>
		
    </body>
</html>