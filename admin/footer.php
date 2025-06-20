<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 




?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Footer</h2>
        <div class="block">               
         <form method="POST">

         <?php 
         $general = new Generalclass;

         $getfooter = $general->getfooter();
         
         $fetchfooter = mysqli_fetch_array($getfooter);

         
        if(isset($_POST['save'])){

            $updatefooter = $general->updatefooter($_POST);
        }
         
        if(isset($updatefooter)){
            echo $updatefooter;
        }
         
         ?>
            <table class="form">					
                <tr>
               <p>About us</p>
                    
                   
                        <textarea name="aboutus" id="" cols="60" rows="5"><?php echo $fetchfooter['aboutus']; ?></textarea>
               
                        
                 <p>Contact us</p>
                    
                    
                    <textarea name="contactus" id="" cols="60" rows="5">
                    <?php echo $fetchfooter['contactus']; ?></textarea>
                   
                </tr>
				
	
				<br>
				<input type="submit" name="save" value='save'>
				
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>