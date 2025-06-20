<?php include "inc/header.php"; ?>

<style>

/***************************Input Tag Style ***********************/

input[type=button], input[type=submit], input[type=reset]  {
    background-color: #56baed;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 5px 20px 40px 20px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  
  input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
    background-color: #39ace7;
  }
  
  input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
    -moz-transform: scale(0.95);
    -webkit-transform: scale(0.95);
    -o-transform: scale(0.95);
    -ms-transform: scale(0.95);
    transform: scale(0.95);
  }
  
  input {
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
  }
  
  input:focus {
    background-color: #fff;
    border-bottom: 2px solid #5fbae9;
  }
  
  input:placeholder {
    color: #cccccc;
  }
  
  
  
  /* ANIMATIONS */
  
  /* Simple CSS3 Fade-in-down Animation */
  .fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }
  
  
</style>

        <?php 
        if(!isset($_SESSION['trainerid'])){
            header('Location: trainerlogin.php');
        }

        $trainer = new Trainerclass;
        $trainerid = $_SESSION['trainerid'];
        $gettrainerdata = $trainer->gettrainerdata($trainerid);
        $fetchtrainer = mysqli_fetch_array($gettrainerdata);



        ?>


<div class="container">

    <div class="main-body">
    
        <br>
        
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="admin/upload/<?php if($fetchtrainer['profilepicture']){ echo $fetchtrainer['profilepicture'];}else { echo "avatar.JFIF";} ?>" alt="Admin" class="" style="width: 150px;
                    height: 150px;border-radius:50%;" >
                    <div class="mt-3">
                      <h4><?php echo $fetchtrainer['fname'].' '.$fetchtrainer['lname'] ;?></h4>
                      
                      <a href="https://wa.me/<?php echo $fetchtrainer['whatsapp'] ;?>" class="btn btn-primary">Whatsapp</a>
                      <a href="trainerlogout.php" class='btn btn-danger float-right' >Log Out</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
               
               
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></h6>
                    <span class="text-secondary"><a href="<?php echo $fetchtrainer['instagram'] ;?>">Instagram</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></h6>
                    <span class="text-secondary"><a href="<?php echo $fetchtrainer['facebook'] ;?>">Facebook</a></span>
                  </li>
                </ul>
              </div>
            </div>
          
          
          
            <div class="col-md-8">

           <?php 
          

          if(isset($_POST['update'])){
           
            $updatetrainer = $trainer->updatetrainer($_POST,$_FILES);

          }
          

           ?>

            <?php 
            if(isset($updatetrainer)){
              echo $updatetrainer;
            }
            
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="fname" value="<?php echo $fetchtrainer['fname']; ?>" placeholder="Your First Name">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="lname" value="<?php echo $fetchtrainer['lname']; ?>" placeholder="Your Last Name">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" name="email" value="<?php echo $fetchtrainer['email']; ?>" placeholder="Your Valid Email" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="mobile" value="<?php echo $fetchtrainer['mobile']; ?>" placeholder="Your Valid Mobile No">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Profile Picture</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <span style="color:green">250px x 250px prefer</span>
                      <input type="file" name="profilepicture"  ? placeholder="">
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="address" value="<?php echo $fetchtrainer['address']; ?>" placeholder="Your Address">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Whatsapp Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="whatsapp" value="<?php echo $fetchtrainer['whatsapp']; ?>" placeholder="Your Whatsapp Number">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Instagram Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="instagram" value="<?php echo $fetchtrainer['instagram']; ?>" placeholder="Your Instagram Link">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Facebook Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="facebook" value="<?php echo $fetchtrainer['facebook']; ?>" placeholder="Your Facebook Link">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <textarea class="p-2" name="description" style="border:1px solid #ddd" placeholder=" Description" name="" id="" cols="53" rows="5"><?php echo $fetchtrainer['description']; ?></textarea>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="password" value="<?php echo $fetchtrainer['password']; ?>" placeholder="Your Password">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mt-4">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="cpassword" value="<?php echo $fetchtrainer['cpassword']; ?>" placeholder="Your Confirm Password">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                  <div class="col-sm-9">
                    
                    
                  </div>
                    <div class="col-sm-3">
                    
                      <button type='submit' name="update" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
             
                
              </div>
              </form>
            </div>
          
          
          
          
          
          </div>
        </div>
    </div>

    <?php include "inc/footer.php"; ?>