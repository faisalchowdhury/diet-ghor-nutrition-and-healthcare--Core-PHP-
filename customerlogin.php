<?php 
include "inc/header.php";
?>  

<?php 

if(isset($_SESSION['cmrid'])){
  header('Location: index.php');
}

?>



<?php 
$customer = new Customerclass;

if(isset($_POST['register'])){

    $registercustomer = $customer->registercustomer($_POST);
}


if(isset($_POST['login'])){

  $logincheck = $customer->logincheck($_POST);

}


?>



        <div class="form-modal">
      
    <div class="form-toggle">
        <button  id="" onclick="">log in</button>
        <button  id="" onclick="">sign up</button>
    </div>


  <div class="row">
  
      <div class="col-md-6 "style='border-right: 1px solid #ddd;
'>
      <div id="">
        <form method="POST">
            <?php 
            if(isset($logincheck)){
              echo $logincheck;
            }
            ?>
            <input type="email" name='email'  placeholder="Enter email" required/>
            <input type="password" name='password' placeholder="Enter password" required/>
            <button value="submit" name='login' class="btn btn-primary">login</button>
            
          
        </form>
    </div>


      </div>
      <div class="col-md-6">

      <div id="" >
        <form method="POST" >
        <?php 
            if (isset($registercustomer)){
                echo $registercustomer;
            }
            ?>
            <input type="text" name='fname' placeholder="Enter your First Name"/>
            <input type="text" name='lname' placeholder="Enter your Last Name"/> 
            <input type="email" name='email' placeholder="Enter your email"/>
            <input type="password" name='password' placeholder="Create Password"/>
            <input type="password" name='cpassword' placeholder="Create password"/>
            <button value="submit" name='register' class="btn btn-primary"><i class=""></i> create account
          </button> 
            
        </form>
    </div>
      </div>
  </div>

    
    

</div>

   <br> 
   
   

<?php 
include "inc/footer.php";
?>  
