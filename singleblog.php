
<?php include "inc/header.php"; ?>
<style>


</style>

<?php 

if(isset($_GET['blogid']) || !$_GET['blogid'] == ''){
    $blogid = $_GET['blogid'];
    $blog = new Blogclass();
    $fetchblog = $blog->fetchblog($blogid);
    $blogrow = mysqli_fetch_array($fetchblog);
  

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
Blog you may like
</h1>
<hr>
<div class="row">
          <?php 
          $blog = new Blogclass;
          $randomblog = $blog->randomblog();

          if($randomblog){
            while($fetchblog = mysqli_fetch_array($randomblog)){
              ?>

              
          <div class="col-lg-3">
          <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="admin/upload/<?php echo $fetchblog['featureimage']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fetchblog['title']; ?></h5>
    <p style="text-align:justify" class="card-text"><?php echo substr($fetchblog['description'],0,100); ?>...</p>
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




	<?php include "inc/footer.php"; ?>