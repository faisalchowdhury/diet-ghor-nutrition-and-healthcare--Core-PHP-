<?php 
include "inc/header.php";
?>  


<?php 

if(!isset($_SESSION['cmrid'])){
header('Location: customerlogin.php');
}else {
    $cmrid = $_SESSION['cmrid'];
    $cart = new Cartclass;
    $getcart = $cart->getcart($cmrid);
  
}
 
 ?>


    
    <div class="col-sm-12 col-md-10 col-md-offset-1 cart-main">
    <?php 
     if(mysqli_num_rows($getcart) == 0){
        echo  "<h2 style='color:green;text-align:center;padding:10px 0;'>You Cart is Empty ! Please Shop Now </h2>";
       }
    ?>
<table class="table table-hover">
<thead>
<tr>
<th>Product</th>
<!--<th>Authorized</th> -->
<th>Quantity</th>
<th class="text-center">Price</th>
<th class="text-center">Total</th>
<th> </th>
</tr>
</thead>
<tbody>



<?php

if(isset($getcart)){
    $sum = 0;
    $weight = 0;

    while($fetchcart = mysqli_fetch_array($getcart)){

 ?>

<tr>
<td class="col-sm-8 col-md-6">
<div class="media">
<a class="thumbnail pull-left" href="productdetails.php?productid=<?php echo $fetchcart['productid']; ?>"> <img class="media-object" src="admin/upload/<?php echo $fetchcart['image']; ?>" style="width: 72px; height: 72px;"> </a>
<div class="media-body">
<h4 class="media-heading"><a href="productdetails.php?productid=<?php echo $fetchcart['productid']; ?>"><?php echo $fetchcart['productname']; ?></a></h4>
<h5 class="media-heading"> by <?php echo $fetchcart['brandname']; ?></a></h5>

</div>
</div></td>
<!--<td class="col-md-1 text-left"><strong class="label label-danger">None</strong></td>-->
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
<input type="hidden" value="<?php echo $fetchcart['cartid']; ?> " name="cartid" >
<input name='quantity' type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $fetchcart['quantity']; ?>">
<input type="submit"  value='Update' name="submit" class='btn btn-success mt-1'/>
</td>


<td class="col-sm-1 col-md-1 text-center"><strong><?php echo $fetchcart['price']; ?> Tk</strong></td>
<td class="col-sm-1 col-md-1 text-center"><strong><?php $total =  $fetchcart['quantity'] * $fetchcart['price'] ; echo $total; ?> Tk</strong></td>
<td class="col-sm-1 col-md-1">
<?php 

if(isset($_POST['remove'])){
   
    $deletecart = $cart->deletecart($_POST);
        
}

?>

<input type="hidden" value="<?php echo $fetchcart['cartid']; ?> " name="delcartid" >
<button type='submit' name='remove' class="btn btn-danger">
<span class="fa fa-remove"></span> Remove
</button></td>
</tr>
</form>


<?php

$sum = $sum + $total;
$_SESSION['sum'] = $sum ;
$totalperweight = $fetchcart['weight'] *  $fetchcart['quantity'];
$weight = $weight +  $totalperweight ;
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
<a href="shipping.php?cmrid=<?php echo $_SESSION['cmrid']; ?>" type="button" class="btn btn-success text-white">
Checkout <span class="fa fa-play"></span>
</a></td>
</tr>
</tbody>
</table>
</div>

<?php 

include "inc/footer.php";
?>

