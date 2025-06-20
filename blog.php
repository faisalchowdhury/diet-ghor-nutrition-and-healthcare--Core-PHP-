<?php include "inc/header.php" ;?>

<div class="blog-section section-default">
<h1 class="heading">Blog's</h1>
<hr>
<div class="row">
          <?php 
          $blog = new Blogclass;
          $allblog = $blog->allblog();

          if($allblog){
            while($fetchblog = mysqli_fetch_array($allblog)){
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
          }
          
          ?>
         
      </div>
</div>     
      
<br>

<?php include "inc/footer.php" ;?>