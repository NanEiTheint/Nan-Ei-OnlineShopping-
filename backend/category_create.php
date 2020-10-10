<?php 
	
	include "include/header.php";

 ?>
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Create</h1>
		<a href="category_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="add_category.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="logo">Logo</label>
					<input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">

				</div>
				<input type="submit" value="Save" class="btn btn-primary float-right mb-3">
			</form>
		</div>
	</div>
 <?php 
	
	include "include/footer.php";

 ?>