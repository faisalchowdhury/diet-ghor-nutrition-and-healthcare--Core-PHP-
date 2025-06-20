<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
 $general = new Generalclass;
 
 $getslider = $general->getslider();
 $fetchslider = mysqli_fetch_array($getslider);


 if(isset($_POST['submit'])){

    $updateslider = $general->updateslider($_POST,$_FILES);
 }

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Slider</h2>
        <?php 
        if(isset($updateslider)){
            echo $updateslider;
        }
        ?>
        <div class="block sloginblock">               
         <form method="POST" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Slider Text</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Slider text..."  name="slidertext" class="medium" value="<?php echo $fetchslider['slidertext']; ?>" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>slider One</label>
                    </td>
                    <td>
                    <input type="file" name="slider1">
                    
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>slider Two</label>
                    </td>
                    <td>
                    <input type="file"  name="slider2">
                    
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>slider Three</label>
                    </td>
                    <td>
                    <input type="file" name="slider3">
                    
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