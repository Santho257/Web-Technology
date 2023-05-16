<?php
	include("connect.php");
?>
<section class="sections">
	<h3 class="title">View Categories</h3>
	<table class="view-table">
		<thead>
			<th>S.No</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Remove</th>
		</thead>
		<?php
			$cats = 'select * from categories';
			$res = mysqli_query($con,$cats);
			$i = 1;
			while($row=mysqli_fetch_assoc($res)){
				$id=$row['ID'];
				$title=$row['TITLE'];
				echo "<tr>
						<td>$i</td>
						<td>$title</td>
						<td><a href='adminpanel.php?edit_category=$id'><i class='fa-solid fa-pen-to-square' style='color: blue;'></i></a></td>
						<td><a href='adminpanel.php?delete_category=$id'><i class='fa-solid fa-trash' style='color: red;'></i></a></td>
					</tr>";
				$i++;
			}
		?>
	</table>
</section>