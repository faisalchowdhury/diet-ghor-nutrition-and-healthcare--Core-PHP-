<?php 
include "inc/header.php";
include "inc/sidebar.php";
?>


 <div class="grid_10">
    <div class="box round first grid">
   <div class="section group">
   <div class="main">
    <h1 style="text-transform:capitalize;color:green">Customer Details</h1>
    <hr>
 
        
   
<style>
h1{    margin: 20px;}
 .main {text-align:center;}
 form input[type="text"],input[type="email"],input[type="password"],.register_account form select{
	font-size:12px;
	color:black;
	padding:8px;
	outline:none;
	margin:5px 0;
	width:340px;
}
button {padding: 10px;
    margin-top: 20px;
    background: #2f69b1 !important;
    color: white;
    border: 1px solid #ddd !important;
    border-radius: 5px;
}
button:hover {
    cursor:pointer;
}
.userform {margin: 25px 0;}
    </style>
<form action="" class="userform" method="POST">

<?php

if(isset($_GET['cmrid'])){
    $cmrid = $_GET['cmrid'];
    
    $customer = new Customerclass;
    $getuser = $customer->getuser($cmrid);

 


    if(isset($getuser)){

        while($userrow = mysqli_fetch_array($getuser)){


?>
<?php 

if(isset($updateuser)){
    echo $updateuser;
}

?>
            
   
<div>

<label for="">Name</label>
<br>
<input type="text" value='<?php echo $userrow['fname'].' '.$userrow['lname']; ?>' name='name' placeholder="Name*"  required >
</div>
<div>
<label for="">Email</label>
<br>
<input type="email" value='<?php echo $userrow['email']; ?>' name='email' placeholder="E-mail*"  required>
</div>
<div>
<label for="">Mobile</label>
<br>
<input type="text" value='<?php echo $userrow['mobile']; ?>' name='mobile' placeholder="Mobile"  >
</div>

<div>
<label for="">Address</label>
<br>
<input type="text" value='<?php echo $userrow['address']; ?>' name='address' placeholder="Address" >
</div>

<div>
<label for="">Address 2</label>
<br>
<input type="text" value='<?php echo $userrow['address2']; ?>' name='address2' placeholder="Address 2" >
</div>

<div>
<label for="">Zip</label>
<br>
<input type="text" value='<?php echo $userrow['zip']; ?>' name='zip' placeholder="Zip-code" >
</div>

</td>
<td>


<div>



<?php

        }
    }

}

?> 

</form>

  
   </div>
  
   </div>

</div>
</div>

<?php include "inc/footer.php"; ?>