<?php
	include('connect.php');
	if(isset($_POST['add_prod'])){
		$title=$_POST['title'];
		$already = "select * from products where TITLE='$title'";
		$res = mysqli_query($con,$already);
		$rows = mysqli_num_rows($res);
		// echo $rows;
		if($rows>0){
			echo "<script>alert('Product is already present')</script>";
			exit();
		}
		
		$description=$_POST['desc'];
		$keywords=$_POST['keywords'];
		$category_id=$_POST['category'];
		$stock=$_POST['stock'];
		$price=$_POST['price'];
		$quantity=$_POST['quan'];
		
		$image1=$_FILES['img1']['name'];
		$image2=$_FILES['img2']['name'];
		$image3=$_FILES['img3']['name'];
		
		$temp_image1=$_FILES['img1']['tmp_name'];
		$temp_image2=$_FILES['img2']['tmp_name'];
		$temp_image3=$_FILES['img3']['tmp_name'];
		
		mkdir("adminpanel\Images\\$title");
		move_uploaded_file($temp_image1,"adminpanel\Images\\$title\\$image1");
		move_uploaded_file($temp_image2,"adminpanel\Images\\$title\\$image2");
		move_uploaded_file($temp_image3,"adminpanel\Images\\$title\\$image3");
		
		// echo "$image1\n$image2\n$image3";
		$insert = "insert into `products`(TITLE, DESCRIPTION, KEYWORDS, CATEGORY_ID, IMAGE1, IMAGE2, IMAGE3, STOCK, PRICE, QUANTITY, DATE) values('$title','$description','$keywords','$category_id','$image1','$image2','$image3',$stock,$price,'$quantity',now())";
		$res = mysqli_query($con,$insert);
		// echo "$image1\n$image2\n$image3";
		if($res){
			echo "<script>alert('Product Added successfully')</script>";
		}
	}
?>
<section class="sections">
	<h3 class="title">Add Product</h3>
	<form method="post" action="adminpanel.php?add_pro" enctype="multipart/form-data">
		<section class="form-sect">
			<label for="name">Name</label><br/>
			<input type="text" id="name" name="title" placeholder="Product-Name" required="required"/>
		</section>
		<section class="form-sect">
			<label for="desc">Description</label><br/>
			<input type="textarea" id="desc" name="desc" placeholder="Descriptions" required="required"/>
		</section>
		<section class="form-sect">
			<label for="keywords">Keywords</label><br/>
			<input type="text" id="keywords" name="keywords" placeholder="Keywords" required="required"/>
		</section>
		<section class="form-sect">
			<select name="category">
				<option value="">Select a Category</option>
				<?php
					$cats = 'select * from categories';
					$res = mysqli_query($con,$cats);
					while($row=mysqli_fetch_assoc($res)){
						$id=$row['ID'];
						$title=$row['TITLE'];
						echo "<option value='$id'>$title</option>";
					}
				?>
			</select>
		</section>
		<section class="form-sect">
			<label for="img1">Image1</label><br/>
			<input type="file" id="img1" name="img1" required="required"/>
		</section>
		<section class="form-sect">
			<label for="img2">Image2</label><br/>
			<input type="file" id="img2" name="img2" required="required"/>
		</section>
		<section class="form-sect">
			<label for="img3">Image3</label><br/>
			<input type="file" id="img3" name="img3" required="required"/>
		</section>
		<section class="form-sect">
			<label for="stock">Stocks</label><br/>
			<input type="number" min="0"; id="stock" name="stock" placeholder="Stocks" required="required"/>
		</section>
		<section class="form-sect">
			<label for="price">Price</label><br/>
			<input type="number" min="0"; id="price" name="price" placeholder="Price" required="required"/>
		</section>
		<section class="form-sect">
			<label for="quan">Quantity</label><br/>
			<input type="text" id="quan" name="quan" placeholder="Quantity" required="required"/>
		</section>
		<section class="submit">
			<input type="submit" value="Add Product" name="add_prod"/>
		</section>
	</form>
</section>
<style>
	footer{
		position: sticky;
		width: 100%;
		bottom: 0;
	}
</style>