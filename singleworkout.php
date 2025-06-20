
<?php include "inc/header.php"; ?>
<style>


</style>

<?php 

if(isset($_GET['workoutid']) || !$_GET['workoutid'] == ''){
    $workoutid = $_GET['workoutid'];
    $blog = new Blogclass();
    $fetchworkout = $blog->fetchworkout($workoutid);
    $blogrow = mysqli_fetch_array($fetchworkout);
  

}else {
	header('Location: index.php');
}

?>



    <br>
    <div class="content">
    	<div class="section group">
               
			<div class="product-desc">
			<h2><?php echo $blogrow['title']; ?></h2>
			<p><?php echo $blogrow['description']; ?></p>
            <div class="cont-desc span_1_of_2">				
                <div class="grid">
            <img style='    width: 60%;
            height: auto;
            '  src="admin/upload/<?php echo $blogrow['featureimage']; ?>" alt="" />
                </div>



                </div>
	        
	    </div>
				
	
     <br>
   
     <div class="blog-section section-default content">
<h1 class="heading">
Workout Article you may like
</h1>
<hr>
<div class="row">
          <?php 
          $blog = new Blogclass;
          $randomworkout = $blog->randomworkout();

          if($randomworkout){
            while($fetchworkout = mysqli_fetch_array($randomworkout)){
              ?>

              
          <div class="col-md-4">
        <a href="singleworkout.php?workoutid=<?php echo $fetchworkout['blogid']; ?>">
            <div class="card mb-2 container">
              
            <img src="admin/upload/<?php echo $fetchworkout['featureimage']; ?>" alt="Avatar" class="image">
            <div class="overlay">
            <div class="text">
            <h5><?php echo substr($fetchworkout['title'],0,40) ?></h5>
            
            <p class='description'><?php echo substr($fetchworkout['description'],0,100) ?>..</p>
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




	<?php include "inc/footer.php"; ?>