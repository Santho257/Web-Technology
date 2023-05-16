<?php
	include("connect.php");
?>
<section class="sections">
	<h3 class="title">View Products</h3>
	<table class="view-table">
		<thead>
			<th>S.No</th>
			<th>User_Mobile</th>
			<th>Product_Name</th>
			<th>Quantity</th>
			<th>Date</th>
			<th>Status</th>
		</thead>
		<?php
			$cats = "select * from `orders` where STATUS='paid' order by DATE";
			$res = mysqli_query($con,$cats);
			$i = 1;
			while($row=mysqli_fetch_assoc($res)){
				$id=$row['ORDER_ID'];
				$mobile = $row['PHONE_NO'];
				$prod_name = mysqli_fetch_assoc(mysqli_query($con,"select TITLE from `products` where ID=".$row['PRODUCT_ID']))['TITLE'];
				$quantity = $row['QUANTITY'];
				$date = $row['DATE'];
				echo "<tr>
						<td>$i</td>
						<td>$mobile</td>
						<td>$prod_name</td>
						<td>$quantity</td>
						<td>$date</td>
						<td><a href='adminpanel.php?change_status=$id'><i class='fa-solid fa-check' style='color: green;'></i></a></td>
					</tr>";
				$i++;
			}
		?>
	</table>
</section>