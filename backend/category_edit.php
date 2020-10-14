<?php 
	session_start();
  	if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=='Admin')
  	{
	
	include "include/header.php";
	include "dbconnection.php";

	$id=$_GET["id"];

	$sql="SELECT * FROM categories WHERE id=:category_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":category_id",$id);
	$stmt->execute();

	$category=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Create</h1>
		<a href="category_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="update_category.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $category['name'];?>">
				</div>
				<div class="form-group">
					<label for="logo">Logo</label>
					<input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">
					<input type="hidden" name="oldlogo" value="<?php echo $category['logo'];  ?>">
					<img src="<?php echo $category['logo'];?>" width="100px" height="100px">

				</div>
				<input type="submit" value="Update" class="btn btn-primary float-right mb-3">
			</form>
		</div>
	</div>
 <?php 
	}
  else
  {
    header("location:../index.php");
  }
	include "include/footer.php";

 ?>