<?php
	include("connect.php");
?>
<style>
	footer{
		position: sticky;
		width: 100%;
		bottom: 0;
	}
</style>
<section class="sections">
	<h3 class="title">View Products</h3>
	<table class="view-table">
		<thead>
			<th>S.No</th>
			<th>Product</th>
			<th>Image</th>
			<th>Edit</th>
			<th>Remove</th>
		</thead>
		<?php
			$cats = 'select ID,TITLE,IMAGE1 from products';
			$res = mysqli_query($con,$cats);
			$i = 1;
			while($row=mysqli_fetch_assoc($res)){
				$id=$row['ID'];
				$title=$row['TITLE'];
				$image=$row['IMAGE1'];
				echo "<tr>
						<td>$i</td>
						<td>$title</td>
						<td align='center'><img  class='tab-image' src='adminpanel/images//$title//$image' alt='Product Image'/></td>
						<td><a href='adminpanel.php?edit_prod=$id'><i class='fa-solid fa-pen-to-square' style='color: blue;'></i></a></td>
						<td><a href='adminpanel.php?delete_product=$id'><i class='fa-solid fa-trash' style='color: red;'></i></a></td>
					</tr>";
				$i++;
			}
		?>
	</table>
</section>