<?php 
include "inc/header.php";
?>  
<?php 
include "inc/slider.php";
?>
<?php 
$product = new Productclass;
$trainer = new Trainerclass;
$blog = new Blogclass;
?>

<!----------------------------Trainer Profile start--------------------------->
  
<div class="trainer-profile section-default">
      <h1 class="heading">Hire Our Trainer</h1>
      <hr>
    	<div class="row">
    
    		<!--Profile Card -->


        <?php 
        $gettrainer = $trainer->gettrainer();
        
        if($gettrainer){
          while($fetchtrainer = mysqli_fetch_array($gettrainer)){
            ?>

           
       
    		<div class="col-md-3 col-sm-6 py-3">
    		    <div class="card card-custom profile-card-3">
    		        <div class="background-block" style="background: #dc3545;">
    		           
    		        </div>
    		        <div class="profile-thumb-block">
    		            <img src="admin/upload/<?php if($fetchtrainer['profilepicture']){ echo $fetchtrainer['profilepicture'];}else { echo "avatar.JFIF";} ?>" class="profile"/>
    		        </div>
    		        <div class="card-content">
                    <h2><?php echo $fetchtrainer['fname'].' '.$fetchtrainer['lname'] ; ?></h2>
                    <h6>Member since : <?php echo date("M-Y", strtotime($fetchtrainer['date'])) ;?></h6>
                    <div class="icon-block">
                      <a href="trainerdetails.php?trainerid=<?php echo $fetchtrainer['trainerid'];?>" class="btn btn-success" > View Profile</a>
                    </div>
                    </div>
                </div> 
    		     </div>
    		
        <?php
          }
        }
        ?>

    		
    		
    		
    		
    	</div>
    	 
    	 <div class="find-profile" >
    	     <a href="alltrainerprofile.php" class="btn btn-success">Find More Profile</a>
    	 </div>
    </div>
  
  <!----------------------------Tranier Profile End ---------------------------->


    
  <!---------------------------- Add Slot 2 Start ---------------------> 
   <?php 
    $general = new Generalclass;
    $getadd = $general->getadd();
    if(isset($getadd)){
        $fetchadd = mysqli_fetch_array($getadd);
    }
   ?>  
  <div class="add-slot-2 section-default">
         <a href="<?php echo $fetchadd['add2link']; ?>">
         <img src="admin/upload/<?php echo $fetchadd['add2banner']; ?>" alt="Promotion">
         </a>
     </div>
     
  <!--------------------------- Add Slot 2 End ----------------------> 
     

   <!---------------------------- Newest workouts start ----------------------> 
      
   <div class="new-workout section-default">
      <h1 class="heading">NEWEST WORKOUT</h1>
      <hr>
  


    

        <div class="row">

         <?php 
         
         $getworkout = $blog->getworkout();
         
         if($getworkout){
           while($fetchworkout = mysqli_fetch_array($getworkout)){
             ?>

            
      
        
        <div class="col-md-4">
        <a href="singleworkout.php?workoutid=<?php echo $fetchworkout['blogid']; ?>">
            <div class="card mb-2 container">
              
            <img src="admin/upload/<?php echo $fetchworkout['featureimage']; ?>" alt="Avatar" class="image">
            <div class="overlay">
            <div class="text">
            <h5><?php echo substr($fetchworkout['title'],0,40) ?></h5>
            <p><?php echo substr($fetchworkout['description'],0,100) ?>..</p>
            </div>
            </div>
            
            </div>
            </a>
          </div>

       

          <?php 
           }
         }

         ?>
   </div>
      

          
        



</div>
  <!---------------------------- Newest workouts End ----------------------> 

    
  
  
  

     
    
     <!---------------------------- Product List start  ---------------------->
  <div class="main-product section-default">
        <h1 class="heading">SUPPLEMENT DEALS</h1>
        <hr>
        <div class="row product-row">
            <div class="col-lg-3 col-md-6">
            <div class="shop-all-area">
                <h3>HEALTH STARTS FROM WITHIN</h3>
                <a href="product.php">Shop All</a>
            </div>
            </div>
            
            <?php 
            
            
            
            $getfrontendproduct = $product->getfrontendproduct();
            
            if (isset($getfrontendproduct)){
              while($fetchproduct = mysqli_fetch_array($getfrontendproduct)){

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
      
   <!---------------------------- Add Slot 3 Start ---------------------> 
     
   <div class="add-slot-3 section-default">
            <a href="<?php echo $fetchadd['add3link']; ?>">
         <img src="admin/upload/<?php echo $fetchadd['add3banner']; ?>" alt="Promotion">
         </a>
     </div>
     
   <!---------------------------- Add Slot 3 End ----------------------> 
         

<!---------------------------- Blog Section start----------------------> 
   <div class="blog-section section-default">
      <h1 class="heading">Read Blog's</h1>
      <hr>
      
      <div class="row">
          <?php 
          
          $frontblog = $blog->frontblog();

          if($frontblog){
            while($fetchblog = mysqli_fetch_array($frontblog)){
              ?>

              
          <div class="col-md-3 col-sm-6 py-3">
          <div class="card card-custom" style="width: 18rem">
  <img class="card-img-top" src="admin/upload/<?php echo $fetchblog['featureimage']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fetchblog['title']; ?></h5>
    <p class="card-text"><?php echo substr($fetchblog['description'],0,100); ?>...</p>
    <a href="singleblog.php?blogid=<?php echo $fetchblog['blogid']; ?>" class="btn btn-primary">Read More</a>
</div>
</div>
          </div>

          <?php 
            }
          }
          
          ?>
         
      </div>
      
      
        <div class="more-blog" >
    	     <a href="blog.php" class="btn btn-info">More Blog's</a>
    	 </div>
      
    </div>
   
   
  <!---------------------------- Blog Section End---------------------->

     
     
   <?php include "inc/footer.php" ; ?>