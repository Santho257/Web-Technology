<?php
	include("user_details.php");
?>
<?php
	include('functions.php');
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
<style>
	footer{
		position: static;
	}
</style>
<section class="sections">
	<h3 class="title">Profile</h3>
	<?php
		if($image!=null)
			echo "<img style='width: 150px; height: 150px; ' src='userprofile/$id/$image'/>";
		else
			echo "<img style='width: 150px; height: 150px; ' src='img/logo.png'/>";	
	?>
	<form>
		<section class="form-sect">
			<label for="name">Name</label><br/>
			<?php echo "<input type='text' id='name' name='name' value='$name' required='required'/>"; ?>
		</section>
		<section class="form-sect">
			<label for="adrs">Address</label><br/>
			<?php echo "<input type='text' id='adrs' name='adrs' value='$address' required='required'/>"; ?>
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