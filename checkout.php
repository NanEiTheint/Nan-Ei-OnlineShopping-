<?php 
	include 'include/header.php';

 ?>

 <div class="container">
 	<div class="row">
 		<div class="offset-2 col-md-8">
 			<h3 class="py-5 text-center text-info">Checkout List</h3>
 			<table class="table table-bordered">
 				<thead>
 					<tr>
 						<th scope="col">#</th>
 						<th scope="col">Product</th>
 						<th scope="col">Name</th>
 						<th scope="col">Price</th>
 						<th scope="col">Qty</th>
 						<th scope="col">SubTotal</th>
 					</tr>
 				</thead>
 				<tbody>
 				</tbody>
 			</table>
 			<div class="form-group">
 				<label>Note</label>
 				<textarea class="form-control note"></textarea>
 				<input type="hidden" name="" value="" id="total">
 			</div>
 			<a href="product.php" class="btn btn-success float-left">Continue Shopping</a>
 			<?php 
 				if(!isset($_SESSION['loginuser']))
 				{

 			 ?>
 			 <a href="backend/login.php" class="btn btn-warning float-right">Login To Buy</a>
 			 <?php 
 			 	}
 			 	else
 			 	{

 			  ?>
 				<button class="btn btn-warning float-right buyNow">Buy Now</button>
 				<?php } ?>

 		</div>

 	</div>
 </div>

 <?php 

 	include 'include/footer.php';


  ?>