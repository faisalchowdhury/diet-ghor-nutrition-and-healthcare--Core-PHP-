<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 

$general = new Generalclass;

$getsocial = $general->getsocial();

$fetchsocial = mysqli_fetch_array($getsocial);


if(isset($_POST['submit'])){

    $updatesocial = $general->updatesocial($_POST);
}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">               
         <form method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input value="<?php echo $fetchsocial['facebook']; ?>" type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Instagram</label>
                    </td>
                    <td>
                        <input value="<?php echo $fetchsocial['instagram']; ?>" type="text" name="instagram" placeholder="Twitter link.." class="medium" />
                    </td>
                </tr>
				
	
				
				 <tr>
                    <td>
                        <label>You tube</label>
                    </td>
                    <td>
                        <input value="<?php echo $fetchsocial['youtube']; ?>" type="text" name="youtube" placeholder="Google Plus link.." class="medium" />
                    </td>
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