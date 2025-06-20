<?php include "inc/header.php"; ?>

<?php 

$general = new Generalclass;
if(isset($_GET['search'])){
  $search = $_GET['search'];
  $searchproduct = $general->searchproduct($search);

}

?>


<!----------------------------Trainer Profile start--------------------------->
  
<div class="trainer-profile section-default">
      <h1 class="heading">Trainer Search Result</h1>
      <hr>
    	<div class="row">
    
    		<!--Profile Card -->


        <?php 
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $searchtrainer= $general->searchtrainer($search);
          
          }
        
        if(mysqli_num_rows($searchtrainer) > 0){
          while($fetchtrainer = mysqli_fetch_array($searchtrainer)){
            ?>

           
       
    		<div class="col-md-3">
    		    <div class="card mb-3 card-custom profile-card-3">
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
        }else {
            echo "<h2 style='text-align: center;
            display: block;
            width: 100%;color: #717171;'>No Result Found for '$search'<h2>";
        }
        ?>

    		
    		
    		
    		
    	</div>
    	 
    	
    </div>
  
  <!----------------------------Tranier Profile End ---------------------------->


<!---------------------------- Product List start  ---------------------->
<div class="main-product section-default">
     <h1 class="heading">Product Search Result</h1>
        <hr>
        <div class="row product-row">
         
            
            <?php 
          
            if (mysqli_num_rows($searchproduct) > 0){
              while($fetchproduct = mysqli_fetch_array($searchproduct)){

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
            }else {
                echo "<h2 style='text-align: center;
                display: block;
                width: 100%;color: #717171;'>No Result Found for '$search'<h2>";
            }
            ?>
            
          
        </div>
         
     </div> 
     <!---------------------------- Product List End  ---------------------->


     <!------------------------- Workout list start  ---------------------->  

 <h1 class="heading">Workout Search Result</h1>
<hr> 
 <div class="row">
          <?php 
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $searchworkout = $general->searchworkout($search);
          
          }

          if(mysqli_num_rows($searchworkout)){
            while($fetchblog = mysqli_fetch_array($searchworkout)){
              ?>

              
          <div class="col-lg-3">
          <div class="card mb-3 card-custom" style="width: 18rem;">
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
          }else {
            echo "<h2 style='text-align: center;
            display: block;
            width: 100%;color: #717171;'>No Result Found for '$search'<h2>";
        }
          
          ?>
         
      </div>
</div>     
      
<br>


     <!---------------------------- Blog List start ---------------------->
     <div class="blog-section section-default container m-auto">
<h1 class="heading">Blog Search Result</h1>
<hr>
<div class="row">
          <?php 
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $searchblog = $general->searchblog($search);
          
          }
          

          if(mysqli_num_rows($searchblog) >0){
            while($fetchblog = mysqli_fetch_array($searchblog)){
              ?>

              
          <div class="col-lg-3">
          <div class="card mb-3 card-custom" style="width: 18rem;">
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
          }else {
            echo "<h2 style='text-align: center;
            display: block;
            width: 100%;color: #717171;'>No Result Found for '$search'<h2>";
        }
          
          ?>
         
      </div>
</div>     
      
<br>
 <!---------------------------- Blog list End  ---------------------->  

 








  <?php include "inc/footer.php"; ?>