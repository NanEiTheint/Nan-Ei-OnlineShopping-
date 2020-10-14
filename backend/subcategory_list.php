<?php 

	session_start();
  	if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=='Admin')
  	{
	include "include/header.php";
	include "dbconnection.php";

 ?>
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">SubCategory List</h1>
		<a href="subcategory_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add SubCategory</a>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>SubCategory Name</th>
							<th>Category Name</th>
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>SubCategory Name</th>
							<th>Category Name</th>
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
						$sql="SELECT subcategories.*,categories.name as cat_name FROM subcategories,categories WHERE subcategories.category_id=categories.id";
						$stmt=$pdo->prepare($sql);
						$stmt->execute();
                  			//var_dump($stmt);
						$subcategories=$stmt->fetchAll();
                  			//var_dump($items);
						$no=1;
						foreach ($subcategories as $subcategory) 
						{


							?>
							<tr>
								<td><?php echo $no++ ;?></td>
								<td><?php echo $subcategory["name"]; ?></td>
								<td><?php echo $subcategory["cat_name"]; ?></td>
								<td><a href="" class="btn btn-outline-primary">Detail</a>
									<a href="subcategory_edit.php?id=<?php echo $subcategory['id']; ?>" class="btn btn-outline-warning">Edit</a>
									<a href="" class="btn btn-outline-danger btnDelete" data-id="<?php echo $subcategory['id']; ?>">Delete</a></td>
								</tr>
								<?php
							} 
							?>

						</tbody>

					</table>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$(".btnDelete").click(function()
			{
				var id=$(this).data("id");
				var ans=confirm("Are you sure to delete this row!");
				if(ans)
				{
					$.post("subcategory_delete.php",{subcat_id:id});
				}
			})
		})
	</script>
 <?php 
 	}
  else
  {
    header("location:../index.php");
  }
	
	include "include/footer.php";

 ?>