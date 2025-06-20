
<?php 
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php");
 ?>
 

<?php
use database\Db;

class Cartclass {
 

    //Add To cart 

    public function addtocart($data , $proid){

        if(isset($_SESSION['cmrid'])){
            $cmrid = $_SESSION['cmrid'];
            $quantity = mysqli_real_escape_string(db::dbcon(),$data['quantity']);
           
    
            $select = "SELECT * FROM dg_product WHERE productid='$proid'";
            $selectquery = mysqli_query(db::dbcon(),$select);
            $fetchproduct = mysqli_fetch_array($selectquery);
            
            $productid =$fetchproduct['productid'];
            $productname = $fetchproduct['productname'];
            $brandname = $fetchproduct['brandname'];
            $weight = $fetchproduct['weight'];
            $price = $fetchproduct['price'];
            $image = $fetchproduct['image'];
    
    
    
            $selectcart = "SELECT * FROM dg_cart WHERE productid='$proid' AND cmrid='$cmrid'";
            $cartquery = mysqli_query(db::dbcon(),$selectcart);
            
    
    
            if(mysqli_num_rows($cartquery) >= 1){
          
                return $msg = "Product Already Added";
          
              }else{
    
            $insert = "INSERT INTO dg_cart (cmrid , productid ,productname ,brandname,weight ,price , quantity , image) VALUES ('$cmrid' , '$productid' ,'$productname','$brandname','$weight','$price', '$quantity' ,'$image')";
    
            $insertquery = mysqli_query(db::dbcon(),$insert);
    
            if($insertquery){
                header('Location: cart.php');
            }
    
             }
        }
       
    }


    // Get Cart 

    public function getcart($cmrid){

        $select = "SELECT * FROM dg_cart WHERE cmrid = '$cmrid'";
        return $query = mysqli_query(db::dbcon(),$select);
    }
  

    //update cart Quantity


    public function updatequantity($data){
        $cartid = mysqli_real_escape_string(db::dbcon(),$data['cartid']);
        $quantity = mysqli_real_escape_string(db::dbcon(),$data['quantity']);
        $cmrid = $_SESSION['cmrid'];


        if($quantity <= 0 || $quantity > 10){
           return  $msg = "<span style='color:red'>You Can't Put quantity '0' or less then '0' and greater than '10'</span>";
        }else{

        $update = "UPDATE dg_cart SET quantity='$quantity' WHERE cartid='$cartid' AND cmrid='$cmrid' ";
        $query = mysqli_query(db::dbcon(),$update);
        if($query){
            header("Location: cart.php");
        }else{
            return  $msg = "<span style='color:red'>You Cant Put quantity '0' or less then '0'</span>";
        }
    }

    }


    //delete cart 

    public function deletecart($data){
        $cartid = mysqli_real_escape_string(db::dbcon(),$data['delcartid']);

        $delete = "DELETE FROM dg_cart WHERE cartid='$cartid'";
        $query = mysqli_query(db::dbcon(),$delete);


        if($query){
            header("Location: cart.php");
        }

    }
    public function cartrow(){
       
        $cmrid = $_SESSION['cmrid'];
        $select = "SELECT * FROM dg_cart WHERE cmrid='$cmrid'";
    
        $squery = mysqli_query(db::dbcon(),$select);
        
        return $numrows = mysqli_num_rows($squery);
        
      }

    
}