<?php include "inc/header.php"; ?>

<?php 
$order = new Ordermanageclass;
$customer = new Customerclass;

if(isset($_GET['cmrid'])){
        
    $getcmrdata = $customer->getcmrdata();
}


if(isset($_SESSION['cmrid'])){

    if(isset($_POST['save'])){
     $updatecmr = $order->updatecmr($_POST);
    }

}


?>



<div class="container">
<br>
<h4 class="mb-3">Billing address (Shipping address is the same as my billing address)</h4>
<form class="needs-validation" method="POST" novalidate="">
 <div class="row">
<?php 
 if(isset($getcmrdata)){

$fetchcmrdata = mysqli_fetch_array($getcmrdata);

?>

                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" name="fname" class="form-control" id="firstName" placeholder="" value="<?php echo $fetchcmrdata['fname']; ?>" required="">
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" name="lname" class="form-control" id="lastName" placeholder="" value="<?php echo $fetchcmrdata['lname']; ?>" required="">
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name='email' class="form-control" id="email" placeholder="you@example.com" value='<?php echo $fetchcmrdata['email']; ?>'>
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="email">Mobile <span class="text-muted"></span></label>
                    <input required="" type="text" name='mobile' class="form-control" id="" placeholder="+880 " value='<?php echo $fetchcmrdata['mobile']; ?>'>
                    <div class="invalid-feedback"> Please enter a valid Mobile for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name='address' class="form-control" id="address" placeholder="1234 Main St" required="" value='<?php echo $fetchcmrdata['address']; ?>'>
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" name='address2' value='<?php echo $fetchcmrdata['address2']; ?>' class="form-control" id="address2" placeholder="Apartment or suite">
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="country">Country</label>
                        <input type="text" name='country' class="form-control" placeholder="country" value='<?php echo $fetchcmrdata['country']; ?>' required>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>

                    <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select name='state' class="custom-select d-block w-100" id="state" required>
                <option value="">Divisions</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Khulna">Khulna</option>

                   </select>     
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>

                </div>

                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input value="<?php echo $fetchcmrdata['zip']; ?>" type="text" name='zip' class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>
                <hr class="mb-4">
              
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked required class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    
                    
                </div>
                 
                <input type="submit" name='save' class="btn btn-primary my-5" value="Save">
            
                <br>   


</form> 
</div>


<?php 
}
?>

<?php include "inc/footer.php"; ?>                