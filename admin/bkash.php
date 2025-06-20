<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bkash Number and Description</h2>
        <div class="block sloginblock">               
         <form method="POST">

         <?php 
         
         $general = new Generalclass;

         $getbkash = $general->getbkash();
         if (isset($getbkash)){
            $fetchbkash = mysqli_fetch_array($getbkash);
         }

         if(isset($_POST['submit'])){
             $updatebkash = $general->updatebkash($_POST); 
         }
         ?>

            <table class="form">
        
            <tr>
            <td></td>
                <td>
                <label>Website Title</label>
                </td>	
            </tr>				
                <tr>
                   
                <td></td>
                    <td><textarea name="bkash" id="" cols="60" rows="6">
                    <?php echo $fetchbkash['bkash']; ?> </textarea></td>
                </tr>
				
				 <tr>
                 <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>