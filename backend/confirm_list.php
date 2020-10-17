<?php 

  session_start();
  if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=='Admin')
  {


	include "include/header.php";
	include "dbconnection.php";

	$num=1;
	$sql="SELECT orders.*,users.name as user_name FROM orders INNER JOIN users ON users.id=orders.user_id WHERE status=:status_num";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":status_num",$num);
	$stmt->execute();
	$orders=$stmt->fetchAll();

	//var_dump($orders);

 ?>
 
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		
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
                      <th>User Name</th>
                      <th>Voucherno</th>
                      <th>Order Date</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Voucherno</th>
                      <th>Order Date</th>
                      <th>Total</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  		<?php 
                  			$j=1;
                  			foreach ($orders as $order) {

                  				
                  		 ?>
                  		 <tr>
                  		 	<td><?php echo $j++ ?></td>
                  		 	<td><?php echo $order["user_name"] ?></td>
                  		 	<td><?php echo $order["voucherno"] ?></td>
                  		 	<td><?php echo $order["orderdate"] ?></td>
                  		 	<td><?php echo $order["total"] ?></td>
                  		 </tr>
                  		<?php } ?>

                  </tbody>
                  
                </table>
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