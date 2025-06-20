<?php
ob_start();
session_start();
$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../classes/Generalclass.php");
require_once ($filepath."/../classes/Customerclass.php");
require_once ($filepath."/../classes/Productclass.php");
require_once ($filepath."/../classes/Cartclass.php");
require_once ($filepath."/../classes/Ordermanageclass.php");
require_once ($filepath."/../classes/Trainerclass.php");
require_once ($filepath."/../classes/Contactclass.php");
require_once ($filepath."/../classes/Blogclass.php");
require_once ($filepath."/../classes/Calculatorclass.php");
?>

<?php 
$General = new Generalclass;

$getgeneral = $General->getgeneral();
$fetchgeneral = mysqli_fetch_array($getgeneral);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetchgeneral['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="admin/upload/<?php echo $fetchgeneral['flaticon']; ?>" type="images/png" sizes="16x16">
    <!--Bootstrap Cdn Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- main Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
   <section class="main">
               
                <!--Header Top End--> 

                <nav class=" navbar navbar-expand-lg navbar navbar-dark " style="background: #132265">
                <a href="index.php" class="navbar-brand main-logo" ><img src="admin/upload/<?php echo $fetchgeneral['logo']; ?>" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin-top: 50px;">
               >
                <li class="nav-item">
                <a class="nav-link" href="alltrainerprofile.php">Trainer</a>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Product
                </a>
                <div class="dropdown-menu" >
                <a class="dropdown-item" href="product.php">All Product</a>
                <?php 
                $product = new Productclass;
                $getproductcategory = $product->getproductcategory();
               
                if(isset($getproductcategory)){
                  while($fetchcat = mysqli_fetch_array($getproductcategory)){
                 ?>
                <a class="dropdown-item" href="productbycategory.php?catid=<?php echo $fetchcat['catid']; ?>"><?php echo $fetchcat['category']; ?></a>

                 <?php 
                }
              }
                ?>
                </div>

                </li>
               <!-- Blog -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
                </a>
                <div class="dropdown-menu" >
                <a class="dropdown-item" href="blog.php">All Blog</a>
                <?php 
                $blog = new Blogclass;
                $getblogcategory = $blog->getblogcategory();
               
                if(isset($getblogcategory)){
                  while($fetchblogcat = mysqli_fetch_array($getblogcategory)){
                 ?>
                <a class="dropdown-item" href="blogbycategory.php?catid=<?php echo $fetchblogcat['catid']; ?>"><?php echo $fetchblogcat['category']; ?></a>

                 <?php 
                }
              }
                ?>
                </div>

                </li>


                <!-- workout -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Workout
                </a>
                <div class="dropdown-menu" >
                <a class="dropdown-item" href="workout.php">All Workout</a>
                <?php 
                $blog = new Blogclass;
                $getworkoutcategory = $blog->getworkoutcategory();
               
                if(isset($getworkoutcategory)){
                  while($fetchblogcat = mysqli_fetch_array($getworkoutcategory)){
                 ?>
                <a class="dropdown-item" href="workoutbycategory.php?catid=<?php echo $fetchblogcat['catid']; ?>"><?php echo $fetchblogcat['category']; ?></a>

                 <?php 
                }
              }
                ?>
                </div>

                </li>

              
                
                <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                
              
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php 
               
               if(isset($_SESSION['cmrid'])){

                ?>
                

                <?php
                }else{

                  ?>
                <a class="dropdown-item" href="customerlogin.php">Customer Login</a>
                  <?php

                }

                ?>
                  <?php 
               
               if(isset($_SESSION['trainerid'])){

                ?>
                <a class="dropdown-item" href="trainerprofile.php?trainerid=<?php echo $_SESSION['trainerid'] ?>">Trainer Profile</a>

                <?php
                }else{

                  ?>
                <a class="dropdown-item" href="trainerlogin.php">Trainer Login</a>
                  <?php

                }

                ?>
                <div class="dropdown-divider"></div>
                <?php 
                
                if(isset($_SESSION['cmrid'])){
                  ?>
                 <a class="dropdown-item" href="order.php">My Order</a>
                  <?php
                }

                ?>
                <?php 
                if(isset($_SESSION['cmrid'])){
                  ?>
               
                <a class="dropdown-item" href="cart.php?cmrid=<?php echo $_SESSION['cmrid']; ?>">Cart</a>
               
                  <?php
                }
                ?>
                </div>
                </li>

                <!-- Tools / Calculator start  --> 

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tools
                </a>
                <div class="dropdown-menu" >
                
                <a class="dropdown-item" href="bmrcalculator.php">BMR Calculator</a>
                <a class="dropdown-item" href="bodyfat.php">Bodyfat % Calculator</a>
                <a class="dropdown-item" href="measurementcal.php">Ideal Measurements Calculator</a>
                </div>

                </li>
                <!-- Tools / Calculator End  -->



               
               
                </ul>
                <div  class="search-custom ">
                <form method="GET" action='search.php' class="form-inline my-2 my-lg-0">
                <input style='
                width:60%;' class="form-control mr-sm-2" type="search" value="<?php if(isset($_GET['search'])){
                  echo $_GET['search'];
                } ?>" name='search' placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='submit'>Search</button>
                </form>
                </div>

                <!--Header Top Start-->
                <div class="header-top text-light">
                  <p>24/7 Live Support</p>
                <div class="header-top-left">
                
                <span class="pb-1"><i class="fas fa-envelope"></i>
                <?php echo $fetchgeneral['topbaremail']; ?></span>
                <span><i class="fas fa-phone-alt"></i> <?php echo $fetchgeneral['topbarmobile']; ?></span>
                </div>  
                </div>
                


                <div class="top-icon">
                <span class="px-3"><i style="font-size: 25px" class="fas fa-shopping-cart">(<a href="cart.php" title="View my shopping cart" rel="nofollow">
						
								<span class="">
								Tk 
                               <?php 
								
								if(isset($_SESSION['sum']) &&  isset($_SESSION['cmrid']) ){
									$shoping =  $_SESSION['sum'];
									$cart = new Cartclass();
									$cartrow = $cart->cartrow();
									
									
									
	
									if(isset($cartrow) && $cartrow == 0){
									echo 0;
									}else{
									echo $shoping;
									
									}
									
								}else{
									echo '0';
								}

							

								?>

								</span>
							</a>)</i></span>
                
                <?php 
                
                if(isset($_SESSION['cmrid'])){
                ?>
                <a href="logout.php" class="btn btn-danger"><span><i class="fas fa-user-circle"></i></span> Logout</a>
                  <?php
                }else{
                  ?>
                  <a href="customerlogin.php" class="btn btn-danger"><span><i class="fas fa-user-circle"></i></span> login</a>

                  <?php

                }

                ?>
                
                </div>
                </div>
                <br>
             
                </nav> 
               
     <!---------------------------- Main Inner start  ---------------------->                 
                
    <div class="main-inner">
      <!---------------------------- Header start  ---------------------->