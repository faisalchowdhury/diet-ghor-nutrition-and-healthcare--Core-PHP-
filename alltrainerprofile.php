<?php include "inc/header.php"; ?>

<!----------------------------Trainer Profile start--------------------------->
  
<div class="trainer-profile section-default">
      <h1 class="heading">Hire Our Trainer</h1>
      <hr>
    	<div class="row">
    
    		<!--Profile Card -->


        <?php 
        $trainer = new Trainerclass;
        $getalltrainer = $trainer->getalltrainer();
        
        if($getalltrainer){
          while($fetchtrainer = mysqli_fetch_array($getalltrainer)){
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
        }
        ?>

    		
    		
    		
    		
    	</div>
    	 
    	
    </div>
  
  <!----------------------------Tranier Profile End ---------------------------->

<?php include "inc/footer.php"; ?>