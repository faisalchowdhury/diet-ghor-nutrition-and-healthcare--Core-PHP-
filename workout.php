<?php include "inc/header.php" ;?>

<div class="blog-section section-default">
<h1 class="heading">Workout's</h1>
<hr>
<div class="row">
          <?php 
          $blog = new Blogclass;
          $allworkout = $blog->allworkout();

          if($allworkout){
            while($fetchworkout = mysqli_fetch_array($allworkout)){
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
      
<br>

<?php include "inc/footer.php" ;?>