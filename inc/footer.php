</div>
    <!---------------------------- Main Inner end  ----------------------> 
          
   </section> 
   
   <!------------------------------Footer Start-------------------------->
    
   <footer>
      <div class='container-fluid footer-area'>
       <div class="container">
          <div class="row">
            <?php 
            
            $general = new Generalclass;

         $getfooter = $general->getfooter();
         
         $fetchfooter = mysqli_fetch_array($getfooter);
            
            ?>
              <div class="col-lg-3 col-md-6">
                  <h3>About Diet Ghor</h3>
                  <p><?php echo $fetchfooter['aboutus']; ?></p>
              </div>
              
               <div class="col-lg-3 col-md-6">
                  <h3>Contact Us</h3>
                    <p>
                    <?php echo $fetchfooter['contactus']; ?></p>
              </div>
              <div class="col-lg-3 col-md-6">
                  
                  <h3>Social Platform</h3>
                  <div class="social-icons" style="background: white;
                   
                    ">
                    
                     <?php 
                     $general = new Generalclass;
                     $getsocial = $general->getsocial();
                     $fetchsocial = mysqli_fetch_array($getsocial);
                     
                     ?>
                    
                    <a target="_blank" href="<?php echo $fetchsocial['facebook']; ?>"><i class="fab fa-facebook-square"></i></a>
                    <a target="_blank" href="<?php echo $fetchsocial['instagram']; ?>"><i class="fab fa-instagram-square"></i></a>
                    <a target="_blank" href="<?php echo $fetchsocial['youtube']; ?>"><i class="fab fa-youtube-square"></i></a>
                  
                    </div>
                  

                   <?php 
                
                if(isset($_SESSION['trainerid'])){

                    ?>
              
                    <?php

                }else{
                    ?>
                 <a href="trainerlogin.php" class="btn btn-primary btn-lg btn-block my-3">Join as a Trainer</a>
                    <?php
                }

                ?>
              </div>
              
              <div class="col-lg-3 col-md-6">
                  <h3>Subscribe Us</h3>
                  <?php 
                  
                  $general = new Generalclass;

                  if(isset($_POST['submit'])){
                    $subscribe = $general->subscribe($_POST);
                  }
                  if(isset($subscribe)){
                      echo $subscribe;
                  }
                  ?>
                <form method='POST' class="subscribe mb-5 my-lg-0">
                <input required name="email" class="form-control mr-sm-2" type="email" placeholder="Your Email" aria-label="Search" required>
                <button name="submit" class="btn btn-danger btn-md btn-block " type="submit">Subscribe</button>
                </form>
                  
                  
              </div>
              
          </div> 
       </div>
       </div>
       
        <div class="copy-right">

        <p>Copyright <a target="_blank" href="https://www.facebook.com/Website-Generator-100652395169211/">[Website Generator]</a> - Theme by Faisal Chowdhury</p>
        </div>
     </footer>
       
   <!------------------------------Footer End-------------------------->
     
  
   <!------------------------Scripts ------------------------->
   
   <!--Font Awesome start-->
   
    <script src="https://kit.fontawesome.com/791b7f753b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--Font Awesome start-->
    
    <!-- Main Js File -->
    <script src="js/main.js"></script>
</body>
</html>