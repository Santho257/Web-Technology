<?php
	include('connect.php');
	if(isset($_POST['add_cate'])){
		$title=$_POST['title'];
		$already = "select * from categories where title='$title'";
		$res = mysqli_query($con,$already);
		$rows = mysqli_num_rows($res);
		if($rows>0){
			echo "<script>alert('Category is already present')</script>";
			exit();
		}
		$insert = "insert into `categories`(title) values('$title')";
		$res = mysqli_query($con,$insert);
		if($res){
			echo "<script>alert('Category Added successfully')</script>";
		}
	}
?>
<section class="sections">
	<h3 class="title">Add Category</h3>
	<form method="post" action="adminpanel.php?add_cat">
		<section class="form-sect">
			<label for="name">Name</label><br/>
			<input type="text" id="name" name="title" placeholder="Category-Name" required="required" pattern="[a-zA-Z ]+"/>
		</section>
		<section class="submit">
			<input type="submit" value="Add Category" name="add_cate"/>
		</section>
	</form>
</section>