<?php
	include('user_details.php');
	if(isset($_POST['chg_pass'])){
		$old_pass = $_POST['old-pass'];
		if(!password_verify($old_pass,$password)){
			echo "<script>
					alert('old password is wrong');
					window.open('dashboard.php','_self');
				</script>";
		}
		else{
			$new_pass=$_POST['new-pass'];
			$renew_pass=$_POST['renew-pass'];
			if($new_pass!=$renew_pass){
				echo "<script>
						alert('passwords doen not match');
						window.open('dashboard.php','_self');
					</script>";
			}
		else{
			$hash = password_hash($new_pass,PASSWORD_DEFAULT);
				$insert = "update `users` set PASSWORD=$hash where PHONE_NO=$id";
				$res = mysqli_query($con,$insert);
				if($res){
					echo "<script>
							window.open('dashboard.php','_self');
						</script>";
				}
			}
		}
	}
?>

<section class="sections">
	<h3 class="title">Profile</h3>
	<form>
		<section class="form-sect">
			<label for="old-pass">Old Password</label><br/>
			<?php echo "<input type='password' id='old-pass' name='old-pass' placeholder='Old-Password' required='required'/>"; ?>
		</section>
		<section class="form-sect">
			<label for="new-pass">New Password</label><br/>
			<?php echo "<input type='password' id='new-pass' name='new-pass' placeholder='New-Password' required='required'/>"; ?>
		</section>
		<section class="form-sect">
			<label for="renew-pass">Reenter New Password</label><br/>
			<?php echo "<input type='password' id='renew-pass' name='ewnew-pass' placeholder='Reenter New-Password' required='required'/>"; ?>
		</section>
		
		<section class="submit">
			<input type="submit" value="Change Password" name="chg_pass"/>
		</section>
	</form>
</section>