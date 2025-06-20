<?php
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php
use database\Db;

class Customerclass {
    // Register Customer 

    public function registercustomer($data){

        $fname = mysqli_real_escape_string(db::dbcon(),$data['fname']);
        $lname = mysqli_real_escape_string(db::dbcon(),$data['lname']);
        $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
        $password = mysqli_real_escape_string(db::dbcon(),$data['password']);
        $cpassword =mysqli_real_escape_string(db::dbcon(),$data['cpassword']);
        
        $select = "SELECT * FROM dg_customer WHERE email='$email'";
        $squery = mysqli_query(db::dbcon(),$select);

        if(mysqli_num_rows($squery) > 0 ){
            return $msg = "<span style='color:red;'>Email Address Already Registerd </span>";
        }else {
        if($fname == '' || $lname == '' || $email == '' || $password == '' || $cpassword == '' ){

            return $msg = "<span style='color:red'>Field Must not be empty</span>";
        }else {

          if($password === $cpassword){
            $insert = "INSERT INTO dg_customer (fname,lname,email,password,cpassword) VALUES ('$fname' , '$lname' , '$email' , '$password' , '$cpassword')";
            $query = mysqli_query(db::dbcon(),$insert);
            if($query){
                return $msg = "<span style='color:green'>Succefully Register</span>"; 
            }

          }else{
            return $msg = "<span style='color:red'>Password and Confirm Password Are not Matching</span>";  
          }


        }

    }


    }


    //Login Check 

    public function logincheck($data){
      $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
      $password = mysqli_real_escape_string(db::dbcon(),$data['password']);

     $select = "SELECT * FROM dg_customer WHERE email='$email' AND password='$password'";
     $query = mysqli_query(db::dbcon(),$select);
     $fetch = mysqli_fetch_array($query);
     $count = mysqli_num_rows($query);

     if($count === 1){
       header("Location: index.php");
      $_SESSION['cmrid'] = $fetch['cmrid'];
     }else{
      return $msg = "<span style='color:red'>Email or Password not Matching</span>";
     }

    }

    public function getcmrdata(){

      $cmrid = $_SESSION['cmrid'];
      $select = "SELECT * FROM dg_customer WHERE cmrid='$cmrid' ";
     return  $query = mysqli_query(db::dbcon(),$select);
    }

  // get user 
  
  public function getuser($cmrid){
    $select = "SELECT * FROM dg_customer WHERE cmrid='$cmrid'";
    return  $query = mysqli_query(db::dbcon(),$select);
  }



}