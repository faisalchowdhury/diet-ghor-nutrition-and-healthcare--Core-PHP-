<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2> Admin Details</h2>
        <div class="block sloginblock">
        
        <?php 
        
        $admin = new Adminclass;

        $getadmin = $admin->getadmin();
        $fetchadmin = mysqli_fetch_array($getadmin);

        if (isset($_POST['submit'])){
            $updateadmin = $admin->updateadmin($_POST);
        }
        ?>
       
         <form method="POST">
         <input type="hidden" name='adminid' value='<?php echo $fetchadmin['id']; ?>'>
            <table class="form">
            <?php 

            if(isset($updateadmin)){
            echo $updateadmin;
            }

            ?>					
                <tr>
                    <td>
                        <label>Admin Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetchadmin['admin']; ?>" placeholder=""  name="admin" class="medium" required />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Admin Email</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetchadmin['email']; ?>" placeholder="" name="email" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetchadmin['password']; ?>" placeholder="" name="password" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Confirm Password</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetchadmin['cpassword']; ?>" placeholder="" name="cpassword" class="medium" required/>
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
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