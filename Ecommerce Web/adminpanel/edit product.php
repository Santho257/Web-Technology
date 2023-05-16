<?php
	include('connect.php');
	if(isset($_POST['edit_prod'])){
		$title=$_POST['title'];
		$description=$_POST['desc'];
		$keywords=$_POST['keywords'];
		$category_id=$_POST['category'];
		$stock=$_POST['stock'];
		$price=$_POST['price'];
		$quantity=$_POST['quan'];
		
		// echo "$image1\n$image2\n$image3";
		$update = "update `products` set TITLE='$title', DESCRIPTION='$description', KEYWORDS='$keywords', CATEGORY_ID=$category_id, STOCK=$stock, PRICE=$price, QUANTITY='$quantity', DATE=now() where ID = $id";
		$res = mysqli_query($con,$update);
		// echo "$image1\n$image2\n$image3";
		if($res){
			echo "<script>alert('Product Updated successfully')</script>";
		}
	}
?>
<section class="sections">
	<?php
		if(isset($_GET['edit_prod'])){
			$id=$_GET['edit_prod'];
			$prods = "select * from `products` where ID = $id";
			$res = mysqli_query($con,$prods);
			$row=mysqli_fetch_assoc($res);
			$title=$row['TITLE'];
			$desc=$row['DESCRIPTION'];
			$cate=$row['CATEGORY_ID'];
			$key=$row['KEYWORDS'];
			$price=$row['PRICE'];
			$stock=$row['STOCK'];
			$quantity=$row['QUANTITY'];
		}
	?>
	<h3 class="title">Update Product</h3>
	<form method="post" action="adminpanel.php?edit_prod=<?php echo $id ?>" enctype="multipart/form-data">
		<section class="form-sect">
			<label for="name">Name</label><br/>
			<input type="text" id="name" name="title" value="<?php echo $title?>" required="required"/>
		</section>
		<section class="form-sect">
			<label for="desc">Description</label><br/>
			<input type="textarea" id="desc" name="desc" value="<?php echo $desc?>" required="required"/>
		</section>
		<section class="form-sect">
			<label for="keywords">Keywords</label><br/>
			<input type="text" id="keywords" name="keywords" value="<?php echo $key?>" required="required"/>
		</section>
		<section class="form-sect">
			<select name="category" required="required">
				<option value="">Select a Category</option>
				<?php
					$cats = 'select * from categories';
					$res = mysqli_query($con,$cats);
					while($row=mysqli_fetch_assoc($res)){
						$id1=$row['ID'];
						$title=$row['TITLE'];
						if($id1!=$cate)
							echo "<option value='$id1'>$title</option>";
						else
							echo "<option value='$id1' selected>$title</option>";
					}
				?>
			</select>
		</section>
		<section class="form-sect">
			<label for="stock">Stocks</label><br/>
			<input type="number" min="0"; id="stock" name="stock" value="<?php echo $stock?>" required="required"/>
		</section>
		<section class="form-sect">
			<label for="price">Price</label><br/>
			<input type="number" min="0"; id="price" name="price" value="<?php echo $price?>" required="required"/>
		</section>
		<section class="form-sect">
			<label for="quan">Quantity</label><br/>
			<input type="text" id="quan" name="quan" value="<?php echo $quantity?>" required="required"/>
		</section>
		<section class="submit">
			<input type="submit" value="Update Product" name="edit_prod"/>
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