<?php 
	include "include/header.php";
	include "backend/dbconnection.php";

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as subcategory_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON subcategories.id=items.subcategory_id ORDER BY id DESC LIMIT 8";

	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();

	//var_dump($items);

 ?>
	<!-- Carousel -->
	<div class="container-fluid container-carousel carousel-image  pt-3">
		<div class="carousel slide" id="headerCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#headerCarousel" data-slide-to="1" class=""></li>
				<li data-target="#headerCarousel" data-slide-to="2" class=""></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="image/img6.jpg" class="d-block w-100">
					<div class="img-overlay"></div>
				</div>
				<div class="carousel-item">
					<img src="image/img7.png" class="d-block w-100">
					<div class="img-overlay"></div>
				</div>
				 <div class="carousel-item">
				 	<img src="image/img10.jpg" class="d-block w-100">
				 	<div class="img-overlay"></div>
				 		
				 </div>
			</div>
		</div>
	</div>	
	<h4 class="text-center text-info py-5">NEW ARRIVAL</h4>
	<div class="container">
		<div class="row">
			<?php 

				foreach ($items as $item) {
					
			 ?>
			<div class="col-md-3 col-6 py-4">
				<div class="card">
                        <img class="card-img-top product_img" src="backend/<?= $item['photo'] ?>">
                        
                        
					<div class="card-body">
						<p class="text-muted"><b>Brand:</b> <?php echo $item['brand_name']; ?></p>
						<p class="text-muted"><b>Category:</b> <?php echo $item['subcategory_name']; ?></p>
						<p class="text-muted"><b>Name:</b> <?php echo $item['name']; ?></p>
						<p class="text-muted"><b>Price:</b> 
							<?php 
							if($item['discount'])
							{
								echo $item['discount']." MMK";

								?>
								<s class="d-block pl-5"><?php echo $item['price']." MMK"; ?></s>
								<?php 
							}
							else
							{
								echo $item['price']." MMK";
							}

							?>
						</p class="text-muted">
						<a href="#" class="btn btn-outline-success btnViewDetail" data-target="#detailPorduct" data-toggle="modal" id="detailModal" data-photo="<?php echo $item['photo'] ?>" data-name="<?php echo $item['name'] ?>" data-brand="<?php echo $item['brand_name'] ?>" data-category="<?php echo $item['subcategory_name'] ?> " data-price="<?php echo $item['price'] ?>" data-discount="<?php echo $item['discount'] ?>" data-description="<?php echo $item['description'] ?>"><i class="fas fa-eye"
						></i></a>
						<a href="javascript:void(0)" class="btn btn-outline-info ml-4 btnAddToCart" data-id="<?php echo $item['id'] ?>" data-photo="<?php echo $item['photo'] ?>" data-name="<?php echo $item['name'] ?>" data-price="<?php echo $item['price'] ?>" data-discount="<?php echo $item['discount'] ?>">Add to cart</a>
						
					</div>
				</div>
				
			</div>
			<?php } ?>
			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="offset-md-5 col-md-2 py-5">
				<a href="store/product.php" class="btn btn-outline-info btn-block my-4" title="view more...">View More...</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-5 py-5">
				<img src="image/img8.jpg" class="img-fluid">
			</div>
			<div class="col-md-7 py-5">
				<h3>About Our Website</h3>
				<p class="py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
	
	<?php 
		include "include/footer.php"

	 ?>