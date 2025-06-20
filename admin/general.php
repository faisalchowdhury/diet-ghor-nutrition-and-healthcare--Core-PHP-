<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
 $general = new Generalclass;
 
 $getgeneral = $general->getgeneral();
 $fetchgeneral = mysqli_fetch_array($getgeneral);


 if(isset($_POST['submit'])){

    $updategeneral = $general->updategeneral($_POST,$_FILES);
 }

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php 
        if(isset($updategeneral)){
            echo $updategeneral;
        }
        ?>
        <div class="block sloginblock">               
         <form method="POST" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Website Title..."  name="title" class="medium" value="<?php echo $fetchgeneral['title']; ?>" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Flat Icon</label>
                    </td>
                    <td>
                    <input type="file" name="flaticon">
                    
                    </td>
                </tr>
                <tr>
                <td></td>
                <td><img style="width: 90px;" src="upload/<?php echo $fetchgeneral['flaticon']; ?>" alt=""></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <label>Logo</label>
                    </td>
                    <td>
                       <input type="file" name="logo">
                    </td>
        
                </tr>
                <tr>
                <td></td>
                <td><img style="width: 90px;" src="upload/<?php echo $fetchgeneral['logo']; ?>" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <label>Top-bar Email</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Top-bar Text..."  name="topbaremail" class="medium" value="<?php echo $fetchgeneral['topbaremail']; ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Top-bar Mobile</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Top-bar Text..."  name="topbarmobile" class="medium" value="<?php echo $fetchgeneral['topbarmobile']; ?>" />
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