<?php
	include("connect.php");
?>
<section class="sections">
	<h3 class="title">View Products</h3>
	<table class="view-table">
		<thead>
			<th>S.No</th>
			<th>Product_Name</th>
			<th>Quantity</th>
			<th>Date</th>
			<th>Status</th>
		</thead>
		<?php
			$cats = "select * from `orders` where PHONE_NO=".$_SESSION['phone'];
			$res = mysqli_query($con,$cats);
			$i = 1;
			while($row=mysqli_fetch_assoc($res)){
				$id=$row['ORDER_ID'];
				$prod_name = mysqli_fetch_assoc(mysqli_query($con,"select TITLE from `products` where ID=".$row['PRODUCT_ID']))['TITLE'];
				$quantity = $row['QUANTITY'];
				$date = $row['DATE'];
				$status = $row['STATUS'];
				echo "<tr>
						<td>$i</td>
						<td>$prod_name</td>
						<td>$quantity</td>
						<td>$date</td>
						<td>$status</td>
					</tr>";
				$i++;
			}
		?>
	</table>
</section>