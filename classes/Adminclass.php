
<?php
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php
use database\Db;

class Adminclass {

   //get Admin Details
    public function getadmin(){
        $select = "SELECT * FROM dg_admin";
        return $query = mysqli_query(db::dbcon(),$select);
    }
     
    // Update Admin
    public function updateadmin($data){
        $id = mysqli_real_escape_string(db::dbcon(),$data['adminid']);
        $admin = mysqli_real_escape_string(db::dbcon(),$data['admin']);
        $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
        $password = mysqli_real_escape_string(db::dbcon(),$data['password']);
        $cpassword = mysqli_real_escape_string(db::dbcon(),$data['cpassword']);
        
        if($password === $cpassword){
          
            $update = "UPDATE dg_admin SET admin='$admin',email='$email',password='$password',cpassword='$cpassword' WHERE id='$id'";
            $query = mysqli_query(db::dbcon(),$update);
            return $msg = "<span style='color:green;'>Admin Updated Successfully</span>";
        }else{
            return $msg = "<span style='color:red;'>Password And Confirm Password are Not matching </span> ";
        }

    }


    //Admin Login 

    public function adminlogin($data){
        $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
        $password = mysqli_real_escape_string(db::dbcon(),$data['password']);

        $select = "SELECT * FROM dg_admin WHERE email='$email' AND password='$password'";
        $query = mysqli_query(db::dbcon(),$select);
        $fetchadmin = mysqli_fetch_array($query);
        $countadmin = mysqli_num_rows($query);
        if ($countadmin === 1){
          header('Location: index.php');
          $_SESSION['admin'] = $fetchadmin['email'];
        }else{
            
           return $msg = "<span style='color:red;'>Email Or Password Not Matching</span>";
        }
    }


}    