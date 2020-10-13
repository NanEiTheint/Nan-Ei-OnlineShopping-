<?php 
	include "include/header.php";
	include "dbconnection.php";

  


 ?>
 
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item List</h1>
		<a href="item_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Item</a>
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
                      <th>Item Name</th>
                      <th>Codeno</th>
                      <th>Price</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Item Name</th>
                      <th>Codeno</th>
                      <th>Price</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  		<?php 
                  			$sql="SELECT * FROM items";
                  			$stmt=$pdo->prepare($sql);
                  			$stmt->execute();
                  			//var_dump($stmt);
                  			$items=$stmt->fetchAll();
                  			//var_dump($items);
                  			$no=1;
                  			foreach ($items as $item) 
                  			{

                  			
                  		 ?>
                  		 <tr>
                  		 	<td><?php echo $no++ ;?></td>
                  		 	<td><?php echo $item["name"]; ?></td>
                  		 	<td><?php echo $item["codeno"]; ?></td>
                  		 	<td>

                            <?php 
                              if($item["discount"])
                              {
                                echo $item["discount"]."MMK";
                             

                             ?>
                            <del><?php echo $item["price"]."MMK" ?></del>
                         <?php
                          } 
                          else
                          {
                              echo $item["price"]."MMK";
                          }

                          ?>
                          </td>

                  		 	<td><a href="item_detail.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-primary">Detail</a>
                  		 	<a href="item_edit.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-warning">Edit</a>
                  		 <a href="" class="btn btn-outline-danger btnDelete" data-id="<?php echo $item['id']; ?>">Delete</a></td>
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
      var ans=confirm("Are you sure to delete!");

      if (ans) 
      {
        var id=$(this).data("id");
        //console.log(id);
        $.post("item_delete.php",{item_id:id});
      }
      
    })
  })
</script>
<?php 


	include "include/footer.php";
 ?>