<?php 
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php");
 ?>
 

<?php
use database\Db;

class Contactclass {
//Insert Message 
public function insertmsg($data){
    $name = mysqli_real_escape_string(db::dbcon(),$data['name']);
    $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
    $mobile = mysqli_real_escape_string(db::dbcon(),$data['mobile']);
    $message = mysqli_real_escape_string(db::dbcon(),$data['name']);  

    $insert = "INSERT INTO dg_contact (name, email , mobile , message) VALUES ('$name' , '$email' , '$mobile' , '$message' )";

    $query = mysqli_query(db::dbcon(),$insert);
    
    if($query){
    
        return $msg = "<h6 style='color:green;text-align:center;'>Thank You For Your message ! </h6>";

    }
}

  /**Get Contact */

  public function getcontact(){
    $select = "SELECT * FROM dg_contact WHERE status='new' ";
    return $query = mysqli_query(db::dbcon(),$select);
}

 /**Get Seen */
 public function getseen(){
    $select = "SELECT * FROM dg_contact WHERE status='seen' ";
    return $query = mysqli_query(db::dbcon(),$select);
}


  /**View Contact */

  public function viewcontact($viewid){
    $select = "SELECT * FROM dg_contact WHERE contactid='$viewid'";
    return $query = mysqli_query(db::dbcon(),$select);

}

   /**Seen Contact  */

   public function seencontact($seenid){
    $update = "UPDATE dg_contact SET status='seen' WHERE contactid='$seenid'";
    $query = mysqli_query(db::dbcon(),$update);

}

}