<?php 

	include "include/header.php";
	include "dbconnection.php";

 ?>
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brand List</h1>
		<a href="brand_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add Brand</a>
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
							<th>Brand Name</th>
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Brand Name</th>
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
						$sql="SELECT * FROM brands";
						$stmt=$pdo->prepare($sql);
						$stmt->execute();
                  			//var_dump($stmt);
						$brands=$stmt->fetchAll();
                  			//var_dump($items);
						$no=1;
						foreach ($brands as $brand) 
						{


							?>
							<tr>
								<td><?php echo $no++ ;?></td>
								<td><?php echo $brand["name"]; ?></td>
								<td><a href="" class="btn btn-outline-primary">Detail</a>
									<a href="" class="btn btn-outline-warning">Edit</a>
									<a href="" class="btn btn-outline-danger btnDelete" data-id="<?php echo $brand['id']; ?>">Delete</a></td>
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
				//console.log(id);
				var ans=confirm("Are you sure to delete this row!");
				if(ans)
				{
					$.post("brand_delete.php",{brand_id:id});
				}
			})
		})
	</script>
 <?php 

	include "include/footer.php";

 ?>