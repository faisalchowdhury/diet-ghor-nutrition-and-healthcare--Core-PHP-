<?php include "inc/header.php";?>



     <!---------------------------- Product List start  ---------------------->
     <div class="main-product section-default">
     <h1 class="heading">SUPPLEMENT DEALS</h1>
        <hr>
        <div class="row product-row">
         
            
            <?php 
            
            $product = new Productclass;
            
            if(isset($_GET['catid'])){
                $catid = $_GET['catid'];
                $productbycat = $product->productbycat($catid);
            }
            
            if (isset($productbycat)){
              while($fetchproduct = mysqli_fetch_array($productbycat)){

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
     <!---------------------------- Product List End  ---------------------->
      
   

<?php include "inc/footer.php";?>