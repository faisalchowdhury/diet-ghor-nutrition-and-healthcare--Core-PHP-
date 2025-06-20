<?php 
include "inc/header.php";
?>  
<?php 
$customer = new Customerclass;
$cart = new Cartclass;
$order = new Ordermanageclass;



if(!isset($_SESSION['cmrid'])){
    header('Location: index.php');
}



?>


      <div class="container">
    <div class="py-5 text-center">
        
        <h2>Checkout</h2>
      
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">


            <?php 
            $cmrid = $_SESSION['cmrid'];
            $getcart = $cart->getcart($cmrid);

            if(mysqli_num_rows($getcart) == 0 ){
                header('Location: cart.php');
            }

            if (isset($getcart)){
                $sum = 0;
                $quantity = 0;
               
            
                while($fetchcart = mysqli_fetch_array($getcart)){

            ?>
            

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $fetchcart['productname']; ?></h6>
                        <small class="text-muted">Price : <?php echo $fetchcart['price']; ?>Tk</small>
                        |
                        <small class="text-muted">Quantity : <?php echo $fetchcart['quantity']; ?></small>
                    </div>
                    <span class="text-muted"><small class="text-muted"> <?php echo $total = $fetchcart['price'] * $fetchcart['quantity'] ?> Tk</small></span>
                </li>

                <?php
                $sum = $sum + $total;
                $quantity = $quantity + $fetchcart['quantity'];

                $customer = new Customerclass;
                    
                     if(isset($_GET['cmrid'])){
                     $cmrid = $_GET['cmrid'];    
                     $getuser = $customer->getuser($cmrid);
                     $fetchcmrdata = mysqli_fetch_array($getuser); 

                    }

                    if($fetchcmrdata['state'] == 'Dhaka'){
                         $fiveproduct = 60;
                         if($quantity < 5){
                             $shipping = 60;
                         }else {
                         $perorder = $quantity / 5;
                         $shipping = $perorder * $fiveproduct;
                        }
                        
                    }else{
                        $fiveproduct = 120;
                        if($quantity < 5){
                            $shipping = 120;
                        }else {
                        $perorder = $quantity / 5;
                        $shipping = $perorder * $fiveproduct;
                       }
                       
                    }
             
                
                }
                }

                ?>

                <li class="list-group-item d-flex justify-content-between bg-light">
                    <!--
                   <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>

                   
                    <span class="text-success">-$5</span>
                     -->
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Shipping (TK)</span>
                    <strong>
                     
                     <?php
                     

                     echo $shipping.'Tk';
                     

                     ?>
                     
                     
                    </strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (TK)</span>
                    <strong>
                    
                    <?php 
                    
                  
                    $grandtotal =$sum + $shipping;
                    echo $grandtotal;

                    ?>
                    Tk
                    </strong>
                </li>
            </ul>
            <!--
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
            -->
        </div>
        <div class="col-md-8 order-md-1">
          
        
                   
               
    <?php 
    
    if(isset($_GET['cmrid'])){
        
        $getcmrdata = $customer->getcmrdata();
    }

    if(isset($_POST['save'])){
        $ordermanage = $order->ordermanage($_POST);
    }


     
            ?>
   
         <form class="needs-validation" method="POST" novalidate="">
               
                <hr class="mb-4">
                <h4 class="mb-3">Payment Via Bkash</h4>
                <?php 
                
                $general = new Generalclass;
                $getbkash = $general->getbkash();
                if (isset($getbkash)){
                    $fetchbkash = mysqli_fetch_array($getbkash);
                 }

                ?>
                <img style="width:250px" class="pb-3" src="admin/upload/bkash.png" alt="">
                <h5 class="text-dark"><?php echo $fetchbkash['bkash']; ?> </h5>
                <hr>
                <div class="d-block my-3">
                    
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Your Bkash Number</label>
                        <input type="text" name='bkashno' class="form-control" id="cc-name" placeholder="Your Bkash Number (required)" required="">
                        <small class="text-muted">Put the Bkash number from where you sent money</small>
                        <div class="invalid-feedback">  </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Bkash Transaction Id</label>
                        <input type="text" name='bkashtid' class="form-control" id="cc-number" placeholder="transaction id (required)" required="">
                        <div class="invalid-feedback">  </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <label for="cc-expiration">Total Amount You Sent</label>
                        <input type="text" name='senttk' class="form-control" id="cc-expiration" placeholder="Total Amount You Sent" required="">   
                    </div>
                    
                </div>
                <hr class="mb-4">
                <button type='submit' name='save' class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>

            <?php
            
               
            ?>



        </div>
    </div>
 
</div> 
   <br>



<?php 

include "inc/footer.php";
?>

