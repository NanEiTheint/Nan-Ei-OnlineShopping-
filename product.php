<?php 
	include "include/header.php";
	include "backend/dbconnection.php";

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as subcategory_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON subcategories.id=items.subcategory_id ORDER BY id DESC LIMIT 8";

	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();

	//var_dump($items);

 ?>
	<h3 class="text-center text-info py-4">Our Products</h3>
	<div class="container">
		<div class="row">
			<?php 

				foreach ($items as $item) {
					
			 ?>
			<div class="col-md-3 col-6 py-4">
				<div class="card">
					<img src="backend/<?= $item['photo']?>" class="card-img-top">
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
	<?php 

		include "include/footer.php";

	 ?>