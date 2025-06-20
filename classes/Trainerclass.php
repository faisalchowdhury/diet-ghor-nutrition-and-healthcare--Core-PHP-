
<?php
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php
use database\Db;

class Trainerclass {

    //Register Trainer 

    public function registertrainer($data){

        $fname = mysqli_real_escape_string(db::dbcon(),$data['fname']);
        $lname = mysqli_real_escape_string(db::dbcon(),$data['lname']);
        $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
        $password = mysqli_real_escape_string(db::dbcon(),$data['password']);
        $cpassword =mysqli_real_escape_string(db::dbcon(),$data['cpassword']);

         

        $select = "SELECT * FROM dg_trainer WHERE email='$email'";
        $squery = mysqli_query(db::dbcon(),$select);

        if(mysqli_num_rows($squery) > 0 ){
            return $msg = "<span style='color:red;'>Email Address Already Registerd </span>";
        }else{

        if($fname == '' || $lname == '' || $email == '' || $password == ''  || $cpassword == ''){
          return $msg = "<span style='color:red;'> Field Must Not be Empty</span>";
        }else{
             
        $select = "SELECT * FROM dg_trainer WHERE email='$email'";
        $squery = mysqli_query(db::dbcon(),$select);

        if(mysqli_num_rows($squery) > 0 ){
            return $msg = "<span style='color:red;'>Email Address Already Registerd </span>";
        }else{
            if($password === $cpassword){
                 
                $insert  = "INSERT INTO dg_trainer (fname,lname,email,password,cpassword) VALUES ('$fname' , '$lname' , '$email' , '$password' , '$cpassword')";
                
                $query = mysqli_query(db::dbcon(),$insert);
               header("Location: trainerlogin.php");

            }else{
                return $msg = "<span style='color:red;'> Password And Confirm Password Are Not Matching</span>";
            }
        }
        }
    }


    }



    
    //Login Check 

    public function logintrainer($data){
        $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
        $password = mysqli_real_escape_string(db::dbcon(),$data['password']);
  
       $select = "SELECT * FROM  dg_trainer WHERE email='$email' AND password='$password'";
       $query = mysqli_query(db::dbcon(),$select);
       $fetch = mysqli_fetch_array($query);
       $count = mysqli_num_rows($query);
  
       if($count === 1){
         header("Location: trainerprofile.php");
        $_SESSION['trainerid'] = $fetch['trainerid'];
       }else{
        return $msg = "<span style='color:red'>Email or Password not Matching</span>";
       }
  
      }


      // Trainer Details 

      public function gettrainerdata($trainerid){
          $select = "SELECT * FROM dg_trainer WHERE trainerid = '$trainerid'";
          return $query = mysqli_query(db::dbcon(),$select);
      }
  


      //update Trainer 

      public function updatetrainer($data,$file){
      $trainerid = $_SESSION['trainerid'];
      $fname = mysqli_real_escape_string(db::dbcon(),$data['fname']);
      $lname = mysqli_real_escape_string(db::dbcon(),$data['lname']);
      $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
      $mobile = mysqli_real_escape_string(db::dbcon(),$data['mobile']);
      $address =mysqli_real_escape_string(db::dbcon(),$data['address']);
      $whatsapp = mysqli_real_escape_string(db::dbcon(),$data['whatsapp']);
      $instagram = mysqli_real_escape_string(db::dbcon(),$data['instagram']);
      $facebook = mysqli_real_escape_string(db::dbcon(),$data['facebook']);
      $description = mysqli_real_escape_string(db::dbcon(),$data['description']);
      $password = mysqli_real_escape_string(db::dbcon(),$data['password']);
      $cpassword = mysqli_real_escape_string(db::dbcon(),$data['cpassword']);

      $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );
        $file = $file['profilepicture'];
        $filename = $file['name'];
        $filesize = $file['size'];
        $filetmp = $file['tmp_name'];

       $div = explode('.' , $filename );
       $fileexe = strtolower(end($div));
       $uniqueimg = md5(time()).$filename;
       $upload = "admin/upload/".$uniqueimg;

       if($fname == '' || $lname == '' || $email == '' ||  $password == '' || $cpassword == '' || $uniqueimg == '' ){
        
        return $msg = "<span style='color:red'>Some Fiels Are Required </span>";

       }else{

        if($password === $cpassword){
            if(in_array($fileexe ,$parmited)){
                move_uploaded_file($filetmp , $upload);
                
               $update = "UPDATE dg_trainer SET fname='$fname' , lname = '$lname' ,mobile='$mobile' , address='$address' , whatsapp = '$whatsapp' , instagram='$instagram',facebook='$facebook' ,description='$description',password='$password',cpassword='$cpassword',profilepicture = '$uniqueimg' WHERE trainerid='$trainerid' ";
        
               $query = mysqli_query(db::dbcon() ,$update );
        
                if($query){
        
                    return $productmsg = "<span style='color:red'>Profile Updated </span>"; 
                }else{
                    return $productmsg = "<span style='color:red'>Profile Not Updated </span>"; 
                }
        
        
               }else{
        
                return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";
               }

        }else{
            return $msg = "<span style='color:red'>Password and Confirm Password Are not matching </span>"; 
        }



       }


      }

     // Get Trainer For Fornt Page

     public function gettrainer(){
         $select = "SELECT * FROM dg_trainer WHERE status='confirm' LIMIT 4";
         return $query = mysqli_query(db::dbcon(),$select);
     }

        // Get All Trainer For Fornt Page
     public function getalltrainer(){
        $select = "SELECT * FROM dg_trainer WHERE status='confirm'";
        return $query = mysqli_query(db::dbcon(),$select);
    }

    // Trainer Request 

public function tainerreq(){
    $select = "SELECT * FROM dg_trainer WHERE status='inactive'  ORDER BY trainerid DESC";
    return $query = mysqli_query(db::dbcon(),$select);
}

 // Confirm Request 

 public function confirmreq($confirmid){
     $update = "UPDATE dg_trainer SET status = 'confirm' WHERE trainerid='$confirmid'";
     $query = mysqli_query(db::dbcon(),$update);
 }

 public function activetrainer(){
    $select = "SELECT * FROM dg_trainer WHERE status='confirm'  ORDER BY trainerid DESC";
    return $query = mysqli_query(db::dbcon(),$select);
}


 // Delete Request 

 public function deletereq($delid){
   $delete = "DELETE FROM dg_trainer WHERE trainerid='$delid'";
   $query = mysqli_query(db::dbcon(),$delete);
 }
 public function deletetrainer(){
    $select = "SELECT * FROM dg_trainer WHERE status='delete'  ORDER BY trainerid DESC";
    return $query = mysqli_query(db::dbcon(),$select);
}


    
}