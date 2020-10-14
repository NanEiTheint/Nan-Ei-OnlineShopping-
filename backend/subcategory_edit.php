<?php 
	session_start();
  	if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=='Admin')
  	{

	include "include/header.php";
	include "dbconnection.php";

	$id=$_GET["id"];

	$sql="SELECT * FROM subcategories WHERE id=:subcategory_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":subcategory_id",$id);
	$stmt->execute();

	$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">SubCategory Create</h1>
		<a href="subcategory_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Go Back</a>
	</div>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="update_subcategory.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $subcategory['id'];?>">
				<div class="form-group">
					<label for="name">SubCategory Name</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $subcategory['name']; ?>">
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<!-- <input type="number" name="category" id="category" class="form-control"> -->
					<select id="category" name="category" class="form-control">
						<option>Choose...</option>
						<?php 

							$sql="SELECT * FROM categories";
							$stmt=$pdo->prepare($sql);
							$stmt->execute();
							$categories=$stmt->fetchAll();
							foreach ($categories as $category) {
								
						 ?>
						 <option value="<?php echo $category['id']; ?>" 
						 	<?php if($category['id']==$subcategory['category_id']){echo "selected";} ?>><?php echo $category["name"]; ?></option>
						 <?php } ?>
					</select>
				
				</div>
				<input type="submit" value="Update" class="btn btn-primary float-right">
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