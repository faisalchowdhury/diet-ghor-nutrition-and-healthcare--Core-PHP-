<?php 
include "inc/header.php";
?>
<br>	
<div class="container">
<div class="card">
<div class="container-fliud">
	<div class="wrapper row" style="padding: 50px;">
		
		<?php 
		 $product = new Productclass;
        
		 if(isset($_GET['productid'])){
			$proid = $_GET['productid'];
			$getproductdetails = $product->getproductdetails($proid);
            $fetchproduct = mysqli_fetch_array($getproductdetails);
		 }

        if(isset($_POST['submit'])){

          $cart = new Cartclass;

		  $addtocart = $cart->addtocart($_POST,$proid);

    
		}
		
		?>

<div class="preview col-md-6">
			
			

			<div class="preview-pic tab-content">
				<div class="tab-pane active" id="pic-1"><img src="admin/upload/<?php echo $fetchproduct['image']; ?>" /></div>
			
			</div>
			<ul class="preview-thumbnail nav nav-tabs">
				<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="admin/upload/<?php echo $fetchproduct['image']; ?>" /></a></li>
			</ul>
			
			<div style= 'display:block;text-align:justify !important;'>
			<p class="product-description" ><?php echo $fetchproduct['description']; ?></p>	
			</div>
			
		</div>
		<div class="details col-md-6">
		    <span class="text-danger"><?php if(isset($addtocart)){echo $addtocart;} ?></span>
			<h3 class="product-title"><?php echo $fetchproduct['productname']; ?></h3>
			<div class="rating">
				
				 


			</div>
			
			
			<h4 class="price">price: <span><?php echo $fetchproduct['price']; ?> Tk</span></h4>
			
			<h5 class="sizes">Weight : <?php echo $fetchproduct['weight']; ?> KG	
			</h5>
			<h5 class="sizes">Brand : <?php echo $fetchproduct['brandname']; ?> 
			</h5>
		<div class="form-group">
		<label for="exampleFormControlSelect1"><h5>Quantity</h5></label>

		<form action="" method='POST'>

		<select name="quantity" style="width: 120px;" class="form-control" id="exampleFormControlSelect1">
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
		</select>

	
		</div>
			<div class="action">
            <?php 
			if(isset($_SESSION['cmrid'])){
				$cmrid = $_SESSION['cmrid'];
			}

			?>

				<button type='submit' value='submit' name='submit'  <?php if(!isset($_SESSION['cmrid'])){ ?>
				onclick="alert('Login your account to buy any product');" 
				<?php } ?> class="add-to-cart btn btn-default" type="button">add to cart</button>


				</form>	
			</div>
		</div>

		<!--href="cart.php?cmrid= <?php //if(isset($cmrid)){ echo $cmrid; }?>" -->




	</div>
</div>
</div>
</div>
<br> 
<div class="main-product section-default">
<div>
	<h1>Related Product</h1>
	<hr>
</div>
<div class="row product-row">
         
            
		 <?php 
		 
		 $product = new Productclass;
		 
		
			 $catid = $fetchproduct['catid'];
			 $relatedproduct = $product->relatedproduct($catid);
		 
		 
		 if (isset($relatedproduct)){
		   while($fetchproduct = mysqli_fetch_array($relatedproduct)){

			 ?>

			<div class="col-lg-3 col-md-6">
		 <div class="card card-custom" style="">
		 <img class="card-img-top" src="admin/upload/<?php echo $fetchproduct['image']; ?>" alt="Card image cap">
		 <div class="card-body">
		 <h5 style="text-transform:uppercase;" class="card-title"><?php echo substr($fetchproduct['productname'],0,30); ?></h5>
		 <p class="card-text"><?php echo substr($fetchproduct['description'],0,60); ?>...</p>
		  <h6 class="text-danger" style="font-size:16px">Tk <?php echo $fetchproduct['price']; ?></h6>
		<a href="productdetails.php?productid=<?php echo $fetchproduct['productid']; ?>" class="btn btn-success"><i class="fas fa-shopping-bag"></i> View Product</a>
		 </div>
		 </div>
		 </div>

		 <?php 

		 }
		 }
		 ?>
		 
	   
	 </div>
	</div> 
     

<?php include "inc/footer.php"; ?>