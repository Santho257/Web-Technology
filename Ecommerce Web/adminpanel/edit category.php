<?php
	if(isset($_POST['edit_cate'])){
		$title=$_POST['title'];
		$already = "select * from categories where title='$title'";
		$res = mysqli_query($con,$already);
		$rows = mysqli_num_rows($res);
		if($rows>0){
			echo "<script>alert('Category is already present')</script>";
			exit();
		}
		
		$update = "update `categories` set TITLE='$title' where ID=$id";
		$res = mysqli_query($con,$update);
		if($res){
			echo "<script>alert('Category Updated successfully')</script>";
		}else{
			echo "<script>alert('Category Updated unsuccessfully')</script>";
		}
	}
?>
<section class="sections">
	<h3 class="title">Edit Category</h3>
	<?php
		$id=$_GET['edit_category'];
		$cats = "select * from `categories` where ID=$id";
		$res = mysqli_query($con,$cats);
		$row=mysqli_fetch_assoc($res);
		$title=$row['TITLE'];
	?>
	<form method="post" action="adminpanel.php?edit_category=<?php echo $id ?>">
		<section class="form-sect">
			<label for="name">Name</label><br/>
			<input type="text" id="name" name="title" value="<?php echo $title ?>" required="required"/>
		</section>
		<section class="submit">
			<input type="submit" value="Update Category" name="edit_cate"/>
		</section>
	</form>
</section>