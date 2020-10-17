<?php 
	session_start();
	include 'backend/dbconnection.php';

	$sql="SELECT * FROM categories";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$categories=$stmt->fetchAll();
	//var_dump($categories);



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SunPalace Store</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="image/girl1.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light py-3 fixed-top menu">
		<div class="container">
			<a class="navbar-brand lead" href="index.php">SunPalace Store</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="checkout.php" class="nav-link" id="count">
						<span class="p1 fa-stack has-badge" id="noti">
							<i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse"></i>
						</span>
					
					</a>
				</li>
				<li class="nav-item active px-2">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item px-2">
					<div class="dropdown">
						<a class="btn text-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories
						</a>
						
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<?php 

							foreach ($categories as $category) {
						 ?>
							<a href="categories.php?id=<?php echo $category['id']?>" class="dropdown-item" type="button"><?php echo $category['name']; ?></a>
						<?php } ?>

							
						</div>
					</div>
				</li>
				<?php 

					if(isset($_SESSION['loginuser']))
					{


				 ?>
				 <li class="nav-item px-2">
					<div class="dropdown">
					  <a class="btn text-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo $_SESSION['loginuser']['name']; ?>
					  </a>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					    <a href="#" class="dropdown-item btn">Profile</a>
					    <a href="backend/logout.php" class="dropdown-item btn">Logout</a>
					    
					  </div>
					</div>	
				</li>
				 
					
				<?php 
					}
					else
					{

				 ?>
				 <li class="nav-item px-2">
						<a class="nav-link" href="backend/login.php">Login</a>
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="backend/register_create.php">Register</a>
					</li>
				<?php } ?>
				<li class="nav-item px-2">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<li class="nav-item px-2">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
				<li class="nav-item px-2 searchbtn">
					<a class="nav-link" href="#">
						<span><i class="fas fa-search "></i></span>
					</a>
				</li>

				
			</ul>
		</div>
	</nav>
	<div class="container mt-5">
		<div class="row searhwork">
			<div class="col-md-1 leftarrow">
				<span class="text-secondary"><i class="fas fa-arrow-left"></i></span>
			</div>
			
			<div class="offset-md-2 col-md-7">

				<div class="form-group has-search">
					<span><i class="fas fa-search form-control-feedback"  title="search"></i></span>
					<!-- <span class="fa fa-search form-control-feedback" title="search"></span> -->
					<input type="text" class="form-control" placeholder="Search this site">
				</div>
			</div>
		</div>
	</div>