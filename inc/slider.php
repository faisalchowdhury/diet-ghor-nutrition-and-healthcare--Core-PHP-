<div class="header">
<?php 
        
        $general = new Generalclass;
        
        $getslider = $general->getslider();
        $fetchslider = mysqli_fetch_array($getslider);
        ?>


       <h1><?php echo $fetchslider['slidertext']; ?></h1>
        <div class="row">

        
                <div class="col-lg-8 col-md-12 mt-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="3000">
                <div class="carousel-inner custom-carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="admin/upload/<?php echo $fetchslider['slider1'] ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="admin/upload/<?php echo $fetchslider['slider2'] ?>">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="admin/upload/<?php echo $fetchslider['slider3'] ?>">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
            <!--Add Slot One -->
            <?php 
 
             $getadd = $general->getadd();
             if(isset($getadd)){
                 $fetchadd = mysqli_fetch_array($getadd);
             }
            
            ?>
            <div class="col-lg-4 col-md-12 mt-3">
                <div class="card" style="width: 18rem;">
                <a href="<?php echo $fetchadd['add1link']; ?>">
                <img style='height:385px;' class="card-img-top" src="admin/upload/<?php echo $fetchadd['add1banner']; ?>" alt="Card image cap">
                </a>
                <div class="card-body">
                
                <h5 class='text-center'> Our Social Platform's</h5>
                <div class="social-icons">
                     <?php 
                     $getsocial = $general->getsocial();
                     $fetchsocial = mysqli_fetch_array($getsocial);
                     
                     ?>
                    
                    <a target="_blank" href="<?php echo $fetchsocial['facebook']; ?>"><i class="fab fa-facebook-square"></i></a>
                    <a target="_blank" href="<?php echo $fetchsocial['instagram']; ?>"><i class="fab fa-instagram-square"></i></a>
                    <a target="_blank" href="<?php echo $fetchsocial['youtube']; ?>"><i class="fab fa-youtube-square"></i></a>
                </div>
                 
               

                
                </div>
                </div>
                
            </div>
            
        </div>
    </div>
    <!---------------------------- Header End  ----------------------> 
      