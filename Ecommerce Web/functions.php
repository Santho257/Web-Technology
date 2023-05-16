<?php
	include('connect.php');
	function categories(){
		global $con;
		$cats = "select * from `categories`";
		$res = mysqli_query($con,$cats);
		while($row=mysqli_fetch_assoc($res)){
			$id=$row['ID'];
			$title=$row['TITLE'];
			echo "<a href='shop.php?category=$id'><li>$title</li></a>";
		}
	}
	
	function show_products(){
		global $con;
		if(!isset($_GET['category'])){
			$prods = "select * from `products`";
			$res = mysqli_query($con,$prods);
			show($res);
		}else{
			$cat_id = $_GET['category'];
			$prods = "select * from `products` where CATEGORY_ID=$cat_id";
			$res = mysqli_query($con,$prods);
			show($res);
		}
	}
	
	function new_arrivals(){
		global $con;
		$prods = "select * from `products` order by DATE desc limit 8";
		$res = mysqli_query($con,$prods);
		show($res);
	}
	
	function featured(){
		global $con;
		$prods = "select * from `products` order by rand() limit 4";
		$res = mysqli_query($con,$prods);
		show($res);
	}
	
	function show($res){
		for($i=0;$row=mysqli_fetch_assoc($res);$i++){
			$id=$row['ID'];
			$title=$row['TITLE'];
			$image=$row['IMAGE1'];
			$price=$row['PRICE'];
			$quantity=$row['QUANTITY'];
			echo "<section class='product'>
						<a href='product_desc.php?id=$id'><section class='pro'>
							<img  class='shop-img' src='adminpanel\images\\$title\\$image'/>
							<section class='empty'></section>
							<section class='details'>
								<p onclick='addCart($i)'><i  class='fa fa-cart-shopping'></i><span>add to cart</span></p>
								<p onclick='addFav($i)'><i class='fa fa-heart'></i></p>
							</section>
						</section></a>
						<section class='name'>
							<h5>$title</h5>
							<p>&#8377; $price + Shipping Charges</p>
							<p>$quantity</p>
						</section>
					</section>";
		}
	}
	
	function product_description(){
		global $con;
		if(isset($_GET['id'])){
			$pro_id = $_GET['id'];
			$prods = "select * from `products` where ID=$pro_id";
			$res = mysqli_query($con,$prods);
			$row = mysqli_fetch_assoc($res);
			$id=$row['ID'];
			$title=$row['TITLE'];
			$desc=$row['DESCRIPTION'];
			$ima1=$row['IMAGE1'];
			$ima2=$row['IMAGE2'];
			$ima3=$row['IMAGE3'];
			$price=$row['PRICE'];
			$quantity=$row['QUANTITY'];
			$stock = $row['STOCK'];
			echo "<section class='sections grid grid-3' id='featured'>
					<h3 class='title'>Product Images</h3>
					<section class='products'>
						<section class='product'>
							<section class='pro'>
								<img src='adminpanel/images//$title//$ima1'/>
							</section>
						</section>
						<section class='product'>
							<section class='pro'>
								<img src='adminpanel/images//$title//$ima2'/>
							</section>
						</section>
						<section class='product'>
							<section class='pro'>
								<img src='adminpanel/images//$title//$ima3'/>
							</section>
						</section>
					</section>
				</section>
		
				<section class='sections see-more' id='prod-desc'>
					<h5 id='name'>$title</h5>
					<p id='desc'>$desc</p>
					<p id='price'>&#8377; $price for $quantity</p>";
			if((isset($_SESSION['phone']) && $_SESSION['phone']!='8754086257')||!isset($_SESSION['phone']))
				echo "<form method='post' action='buy.php?product=$id'>
						<section style='display: flex;' class='form-sect' >
							<input type='number' min='0' max=$stock id='quan' name='quantity' placeholder='quantity' required='required' style='width: 20%;margin: 20px 40%;'/>
						</section>
						<section class='submit'>
							<input type='submit' style='margin: 0 0 20px 40%;' value='Buy Now' name='buy'/>
							<section style='display:inline-block;'><a id='add-cart' href='add_cart.php?prod=$id'> Add To Cart </a></section>
						</section>
					</form>";
				echo "</section>";
		}
	}
	
	function buy_details(){
		if(isset($_POST['buy'])){
			global $con;
			$quantity = $_POST['quantity'];
			$prod_id = $_GET['product'];
			$select = "select TITLE,DESCRIPTION,QUANTITY,PRICE,IMAGE1 from `products` where ID=$prod_id";
			$res = mysqli_query($con,$select);
			$row = mysqli_fetch_assoc($res);
			$prod_title = $row['TITLE'];
			$prod_desc = $row['DESCRIPTION'];
			$prod_image = $row['IMAGE1'];
			$prod_price = $row['PRICE'];
			$prod_quan = $row['QUANTITY'];
			
			$phone = $_SESSION['phone'];
			$select = "select NAME,ADDRESS from `users` where PHONE_NO = $phone";
			$res = mysqli_query($con,$select);
			$row = mysqli_fetch_assoc($res);
			$user_name = $row['NAME'];
			$user_address = $row['ADDRESS'];
			
			echo "<section class='sections' style='width: 100% padding: 0; margin: 0;' id='categories'>
					<table id='price-table'>
						<thead>
							<th colspan=2>Price Details</th>
						</thead>
						<tr>
							<td>Quantity</td>
							<td>$quantity</td>
						</tr>
						<tr>
							<td>Product Price</td>
							<td>$prod_price</td>
						</tr>
						<tr>
							<td>Delivery Charges</td>
							<td>50</td>
						</tr>
						<tr>
							<td>Total Amount</td>
							<td>".($prod_price*$quantity+50)."</td>
						</tr>
					</table>
				</section>
				<section class='sections'>
					<section id='del-details'>
						<h5>Deliver to</h5>
						<table id='deli-table'>
							<tr>
								<td><h6>Name</h6></td>
								<td><p>$user_name</p></td>
							</tr><tr>
								<td><h6>Address</h6></td>
								<td><p>$user_address</p></td>
							</tr>
						</table>
					</section>
					<section id='details'>
						<section id='prod-desc'>
							<h5 id='name'>$prod_title</h5>
							<p id='desc'>$prod_desc</p>
							<h6 id='price'>&#8377; $prod_price for $prod_quan</h6>
						</section>
						<section>
							<img src='adminpanel/images/$prod_title/$prod_image' alt='This has to be image'/>
						</section>
					</section>
					<section class='sections see-more'>
						<a href='payment.php?prod=$prod_id&quan=$quantity'> <button type>Continue</button></a>
					</section>
				</section>";
		}
	}
	
	
	
?>