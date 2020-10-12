<?php 

	include "include/header.php";
	include "dbconnection.php";

 ?>

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Create</h1>
		<a href="item_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	</div>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="add_item.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Item Name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="photo">Item Photo</label>
					<input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
				</div>

				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#price" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="home-tab">
						<input type="number" name="price" class="form-control mt-3" placeholder="Unit Price">
					</div>
					<div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab">
						<input type="number" name="discount" class="form-control mt-3" placeholder="Discount Price">
					</div>
					
				</div>
				<div class="form-group">
					<label id="brand">Brand</label>
					<!-- <input type="number" name="brand" id="brand" class="form-control"> -->
					<select class="form-control" id="brand" name="brand">
						<option>Choose.....</option>
						<?php 
							$sql="SELECT * FROM  brands";
							$stmt=$pdo->prepare($sql);
							$stmt->execute();
							$brands=$stmt->fetchAll();


							//var_dump($stmt);
							foreach ($brands as $brand) {
								# code...
							

						 ?>
						 <option value="<?php echo $brand['id']; ?>"><?php echo $brand["name"]; ?> </option>
						<?php } ?>
						 
					</select>
				</div>
				<div class="form-group">
					<label id="subcategory">Subcategory</label>
						<!-- <input type="number" name="subcategory" id="subcategory" class="form-control"> -->
						<select id="subcategory" name="subcategory" class="form-control">
							<option>Choose.....</option>
							<?php 

								$sql="SELECT * FROM subcategories";
								$stmt=$pdo->prepare($sql);
								$stmt->execute();
								$subcategories=$stmt->fetchAll();
								foreach ($subcategories as $subcategory) {
									
							 ?>
							 <option value="<?php echo $subcategory['id'] ?>"><?php echo $subcategory["name"]; ?></option>
							 <?php } ?>
						</select>
					
				</div>
				<div class="form-group">
					<label id="description">Description</label>
					<textarea class="form-control" id="description" name="description"></textarea>
				</div>
				<input type="submit" class="btn btn-primary float-right" value="Save">

			</form>
		</div>
		

	</div>
<?php 

	include "include/footer.php"
 ?>