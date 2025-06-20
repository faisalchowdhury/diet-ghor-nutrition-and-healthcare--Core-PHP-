<?php 
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php");
 ?>
 

<?php
use database\Db;

class Ordermanageclass {
     
   public function updatecmr($data){
    $cmrid = $_SESSION['cmrid'];
    //update User 
    $fname = mysqli_real_escape_string(db::dbcon(),$data['fname']);
    $lname = mysqli_real_escape_string(db::dbcon(),$data['lname']);
    $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
    $mobile = mysqli_real_escape_string(db::dbcon(),$data['mobile']);
    $address =mysqli_real_escape_string(db::dbcon(),$data['address']);
    $address2 = mysqli_real_escape_string(db::dbcon(),$data['address2']);
    $country = mysqli_real_escape_string(db::dbcon(),$data['country']);
    $state =mysqli_real_escape_string(db::dbcon(),$data['state']);
    $zip =mysqli_real_escape_string(db::dbcon(),$data['zip']);

    
    $update = "UPDATE dg_customer SET fname='$fname',lname='$lname',email='$email',mobile='$mobile' ,address='$address' , address2='$address2' , country='$country',state='$state',zip='$zip' WHERE cmrid='$cmrid'  ";
    $query = mysqli_query(db::dbcon(),$update);

    if($query){
      header("Location: checkout.php?cmrid=".$cmrid);
    }

   }

   // Order Manage
    public function ordermanage($data){
     
      $cmrid = $_SESSION['cmrid'];
   //******************************************************/
        // Payment Data 
        $bkashno = mysqli_real_escape_string(db::dbcon(),$data['bkashno']);
        $bkashtid = mysqli_real_escape_string(db::dbcon(),$data['bkashtid']);
        $senttk = mysqli_real_escape_string(db::dbcon(),$data['senttk']);
        
    
        $insertorder = "INSERT INTO dg_order_session (cmrid,bkashno,bkashtid,senttk) VALUE ('$cmrid' ,'$bkashno' ,'$bkashtid' , '$senttk' )";
        $orderquery = mysqli_query(db::dbcon(),$insertorder);

        
       $selectordersession = "SELECT * FROM dg_order_session WHERE cmrid='$cmrid' AND date = NOW() ";
       $ordersessionquery = mysqli_query(db::dbcon(),$selectordersession);
       $fetchordersession  = mysqli_fetch_array($ordersessionquery);
       $ordersessionid = $fetchordersession['ordersessionid'];
       





       //insert Order 
        $selectcart = "SELECT * FROM dg_cart WHERE cmrid='$cmrid'";
        $cartquery = mysqli_query(db::dbcon(),$selectcart);
        // $fetchcart = mysqli_fetch_array($cartquery);
     
        while($getproduct = mysqli_fetch_array($cartquery)){

            $productid = $getproduct['productid'];
            $productname = $getproduct['productname'];
            $quantity = $getproduct['quantity'];

            $weight = $getproduct['weight'] * $getproduct['quantity'] ;
            $price = $getproduct['price'] * $quantity;

            $image = $getproduct['image'];
     
            $insert = "INSERT INTO dg_order (cmrid,	productid,productname,	quantity, weight,price,	image,ordersessionid ) VALUES ('$cmrid' ,' $productid','$productname','$quantity','$weight','$price','$image','$ordersessionid' )";
     
            $insertquery = mysqli_query(db::dbcon(),$insert);
     
            /**Mail */
            if($insertquery){
             $subject ="You Got a New Order from Diet Ghor . Visit site Admin Panel For more info";
             $body = "Order Item >>> Id NO: $productid .Product Name $productname ";
             $sender = 'From: dietghor@dietghor.com';
             $recever = 'chowdhuryfaisal66@gmail.com';
             mail($recever ,$subject ,$body ,$sender);
            }
     


              
            
            if($insertquery){
             $deletecart = "DELETE FROM dg_cart WHERE cmrid='$cmrid'";
             $deletequery = mysqli_query(db::dbcon(),$deletecart);
              
              $selectcmr = "SELECT * FROM dg_customer WHERE cmrid='$cmrid'";
              $selectquery = mysqli_fetch_array(db::dbcon(),$selectcmr);
              $fetchcmr = mysqli_fetch_array($selectquery);
              $cmremail = $fetchcmr['email'];
     
             $subject ="Diet Ghor . You Placed And Order ";
             $body = "Your Order is pending Now . Will Check Your Payment and confirm your Order Soon . please check your order page ";
             $sender = 'From: demo.com';
             $recever = "$cmremail";
             mail($recever ,$subject ,$body ,$cmremail);
     
             header('Location: ordersuccess.php');
     
            }
     
         }
        

    }


    // get order session 

    public function getordersession(){
        $select = "SELECT * FROM dg_order_session ORDER BY ordersessionid DESC";
        return $query = mysqli_query(db::dbcon(),$select);
    }

    // Get Order 

    public function getorder($id){
        $select = "SELECT * FROM dg_order WHERE ordersessionid='$id'";
        return $query = mysqli_query(db::dbcon(),$select);
    }


    /**get all order */

public function getallorder(){
    $select = "SELECT * FROM dg_order ORDER BY orderid DESC ";
    return $query = mysqli_query(db::dbcon(),$select);
  }

  
  /**Processing Order */
  
  public function processing($orderid){
    $update ="UPDATE dg_order_session SET status='processing' WHERE ordersessionid='$orderid'";
    $query = mysqli_query(db::dbcon(),$update);
    
    $updateorder ="UPDATE dg_order SET status='processing' WHERE ordersessionid='$orderid'";
    $orderquery = mysqli_query(db::dbcon(),$updateorder);

    if($query){
      header('Location: order.php');
  
    /* 
      $useremail = $_SESSION['cmrid'];
      $selectuser = "SELECT * FROM db_user WHERE userid='$userid'";
      $selectquery = mysqli_fetch_array(db::dbcon(),$selectuser);
      $fetchuser = mysqli_fetch_array($selectquery);
      $useremail = $fetchuser['email'];
  
     $subject ="RBN WORLD .We Confirm Your Order . ";
     $body = " We will get Back soon with Delivery Details. please check your order page ";
     $sender = 'From: rbnwksgd@rbn-world.com';
     $recever = $useremail;
     mail($recever ,$subject ,$body ,$sender);
  
  

    */
  
    }
  
  
  }
  
  /**Deliverd Order */
  
  public function delivered($orderid){
    $update ="UPDATE dg_order_session SET status='delivered' WHERE ordersessionid='$orderid'";

    $updateorder ="UPDATE dg_order SET status='delivered' WHERE ordersessionid='$orderid'";
    $orderquery = mysqli_query(db::dbcon(),$updateorder);

    $query = mysqli_query(db::dbcon(),$update);
    if($query){
      header('Location: order.php');
  
   /*
       $useremail = $_SESSION['userid'];
      $selectuser = "SELECT * FROM rbn_user WHERE userid='$userid'";
      $selectquery = mysqli_fetch_array(db::dbcon(),$selectuser);
      $fetchuser = mysqli_fetch_array($selectquery);
      $useremail = $fetchuser['email'];
  
     $subject ="RBN WORLD .Deliver Successfully. ";
     $body = "You Got Your Order Succfully ";
     $sender = 'From: rbnwksgd@rbn-world.com';
     $recever = $useremail;
     mail($recever ,$subject ,$body ,$sender);  
  */
  
  
    }
  }
  
  // cancel order
  public function cancel($orderid){
    $update ="UPDATE dg_order_session SET status='cancel' WHERE ordersessionid='$orderid'";
    $query = mysqli_query(db::dbcon(),$update);

    $updateorder ="UPDATE dg_order SET status='cancel' WHERE ordersessionid='$orderid'";
    $orderquery = mysqli_query(db::dbcon(),$updateorder);

    if($query){
      header('Location: order.php');
    }
  }
  


  // Front View __ Get Order By Customer

  public function getorderbycmr($cmrid){
     $select = "SELECT * FROM dg_order WHERE cmrid = '$cmrid' ORDER BY ordersessionid DESC";
     return $query = mysqli_query(db::dbcon(),$select);
  }

 
}