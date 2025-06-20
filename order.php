<?php 
include "inc/header.php";
?>  


<?php 

if(!isset($_SESSION['cmrid'])){
header('Location: customerlogin.php');
}else {
    $cmrid = $_SESSION['cmrid'];
    $order = new Ordermanageclass;
    $getorderbycmr = $order->getorderbycmr($cmrid);
  
}
 
 ?>


    
    <div class="col-sm-12 col-md-10 col-md-offset-1 cart-main">
        <br>
    <h1 class="heading">Order History</h1>
   
    <?php 
     if(mysqli_num_rows($getorderbycmr) == 0){
        echo  "<h2 style='color:green;text-align:center;padding:10px 0;'>Not Order Yet </h2>";
       }
    ?>
<table class="table table-hover">
<thead>
<tr>
<th>Product</th>
<th>Date-Time</th>
<th>Quantity</th>
<th class="text-center">Price</th>
<th class="text-center">Total</th>
<th> </th>
</tr>
</thead>
<tbody>



<?php

if(isset($getorderbycmr)){
    $sum = 0;
    $weight = 0;

    while($fetchorder = mysqli_fetch_array($getorderbycmr)){

 ?>

<tr>
<td class="col-sm-8 col-md-6">
<div class="media">
<a class="thumbnail pull-left" href="productdetails.php?productid=<?php echo $fetchorder['productid']; ?>"> <img class="media-object" src="admin/upload/<?php echo $fetchorder['image']; ?>" style="width: 72px; height: 72px;"> </a>
<div class="media-body">
<h4 class="media-heading"><a href="productdetails.php?productid=<?php echo $fetchorder['productid']; ?>"><?php echo $fetchorder['productname']; ?></a></h4>


</div>
</div></td>
<td class="col-md-1 text-left"><strong class="label label-danger"><?php echo date("l jS \of F Y h:i:s A",strtotime($fetchorder['dateandtime'])); ?></strong></td>
<?php 

if(isset($_POST['submit'])){


 $updatequantity = $cart->updatequantity($_POST);
 
 if(isset($updatequantity)){
     echo $updatequantity;
 }
}

?>

<form action="" method="POST">
<td class="col-sm-1 col-md-1" style="text-align: center">
<input type="hidden" value="<?php echo $fetchorder['orderid']; ?> " name="cartid" >
<input readonly name='quantity' type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $fetchorder['quantity']; ?>">

</td>


<td class="col-sm-1 col-md-1 text-center"><strong><?php echo $fetchorder['price']; ?> Tk</strong></td>
<td class="col-sm-1 col-md-1 text-center"><strong><?php $total =  $fetchorder['quantity'] * $fetchorder['price'] ; echo $total; ?> Tk</strong></td>
<td class="col-sm-1 col-md-1">
<?php 


?>

<?php 

if($fetchorder['status'] == 'pending'){
    ?>
    <a  type='submit' name='remove' class="btn btn-warning text-white">
     Pending
    </a>
<?php
}elseif($fetchorder['status'] == 'processing'){
    ?>
    <a  type='submit' name='remove' class="btn btn-info text-white">
     Processing
    </a>
<?php
}elseif($fetchorder['status'] == 'delivered'){
    ?>
    <a  type='submit' name='remove' class="btn btn-success text-white">
     Delivered
    </a>
<?php
}elseif($fetchorder['status'] == 'cancel'){
    ?>
    <a  type='submit' name='remove' class="btn btn-danger text-white">
     Cancel
    </a>
<?php
}

?>


</td>
</tr>
</form>


<?php

$sum = $sum + $total;

}
}

?>

<tr>
<td>   </td>
<td>   </td>
<td>   </td>
<td><h5>Subtotal</h5></td>
<td class="text-right"><h5><strong><?php echo $sum; ?>Tk</strong></h5></td>
</tr>



<tr>
<td>   </td>
<td>   </td>
<td>   </td>
<td>
<button type="button" class="btn btn-default">
<span class="fa fa-shopping-cart"></span> Continue Shopping
</button></td>
<td>
</td>
</tr>
</tbody>
</table>
</div>

<?php 

include "inc/footer.php";
?>

