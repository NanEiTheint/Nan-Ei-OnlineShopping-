<?php 
	include 'include/header.php';
	include 'backend/dbconnection.php';
	$id=$_GET['id'];
	//echo "$id";

	$sql="SELECT * FROM subcategories WHERE category_id=:cat_id ORDER BY id DESC";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":cat_id",$id);
	$stmt->execute();
	$subcategories=$stmt->fetchAll();
	//var_dump($subcategories);


 ?>
 <h3 class="text-center text-info py-5 my-5">Our Products</h3>
	<div class="container">
		<div class="row">
			<div class="col-md-3 py-3 px-3">
				<div class="card">
					<ul class="list-group list-group-flush">
						<?php 
							foreach ($subcategories as $subcategory) {

						 ?>
						<a href="subcategory.php?id<?php $subcategory['id']?>"><li class="list-group-item"><?php echo $subcategory['name'] ?></li></a>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
			<?php 

				foreach ($subcategories as $subcategory) {
					$subid=$subcategory['id'];
							$sql="SELECT items.*,brands.name as brand_name,subcategories.name as subcategory_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON categories.id=subcategories.category_id WHERE items.subcategory_id=:subcat_id";
							$stmt=$pdo->prepare($sql);
							$stmt->bindParam(":subcat_id",$subid);
							$stmt->execute();
							$items=$stmt->fetchAll();
							foreach ($items as $item) {
					
			 ?>
			<div class="col-md-4 col-6 py-4 mx-3">
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
			<?php 
				}
			}
		?>
		</div>
			</div>
		</div>
		
	</div>
 <?php 
 	include 'include/footer.php';

  ?>