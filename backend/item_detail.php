<?php 
	session_start();
  	if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=='Admin')
  	{	
	include "include/header.php";
	include "dbconnection.php";
	
	$id=$_GET["id"];

	//echo "$id";

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as subcat_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE items.id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":item_id",$id);
	$stmt->execute();
	$item=$stmt->fetch(PDO::FETCH_ASSOC );

 ?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Create</h1>
		<a href="item_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo($item['photo'])?>" class="img-fluid">
			</div>
			<div class="col-md-8">
				<h1>Item Information</h1>
				<h5 class="pt-3">Item Name: <?php echo $item["name"]; ?></h5>
				<h5>Brand: <?php echo $item["brand_name"]; ?>
				<h5>Subcategory: <?php echo $item["subcat_name"]; ?></h5>
				<h5>Price: 

					<?php 

						if($item["discount"])
						{
							echo $item['discount']."MMK";
					 ?>
					 <s><?php echo $item["price"]."MMK"; ?></s>
					 <?php 
					 	}
					 	else
					 	{
					 		echo $item["price"]."MMK";
					 	}

					  ?>
				</h5>


				
			</div>
		</div>
		
	</div>
 <?php 
 	include "include/footer.php";
 
 	}
  else
  {
    header("location:../index.php");
  }
  ?>