<?php 
include "inc/header.php";
?>  
  <?php 
        if(!isset($_GET['trainerid'])){
            header('Location: index.php');
        }

        $trainer = new Trainerclass;
        $trainerid = $_GET['trainerid'];
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
                    height: 150px;border-radius:50%;">
                    <div class="mt-3">
                      <h4><?php echo $fetchtrainer['fname'].' '.$fetchtrainer['lname']; ?></h4>
                     
                    <?php 
                    $general = new Generalclass;
                    $getgeneral = $general->getgeneral();
                    $fetchgeneral = mysqli_fetch_array($getgeneral);

                    ?>

                      <a href="https://wa.me/<?php $fetchgeneral['topbarmobile']; ?>" class="btn btn-primary">Join Whatsapp</a>
                     
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
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $fetchtrainer['fname'].' '.$fetchtrainer['lname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $fetchtrainer['email']; ?>
                    </div>
                  </div>
                  <hr>
                  
                    
                  
               
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $fetchtrainer['address']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">About Trainer</h6>
                    </div>
                    <div class="col-sm-9 text-secondary text-justify">
                    <?php echo $fetchtrainer['description']; ?>
                    </div>
                  </div>

               
              <div class="row gutters-sm">
                
                
              </div>
            </div>
          </div>
        </div>
    </div>

<?php 
include "inc/footer.php";
?>  
