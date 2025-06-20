<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
 $general = new Generalclass;
 
 $getadd = $general->getadd();
 if(isset($getadd)){
     $fetchadd = mysqli_fetch_array($getadd);
 }

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Slot</h2>
        
        <div class="block sloginblock">
        <?php 
        if(isset($_POST['submit1'])){
            $updateaddone = $general->updateaddone($_POST,$_FILES); 
        }
        if(isset($_POST['submit2'])){
            $updateaddtwo = $general->updateaddtwo($_POST,$_FILES); 
        }
        if(isset($_POST['submit3'])){
            $updateaddthree = $general->updateaddthree($_POST,$_FILES); 
        }
        ?>
         <form method="POST" enctype="multipart/form-data">
            <table class="form">					
                <?php 
                
                if(isset($updateaddone)){
                    echo $updateaddone;
                }
                if(isset($updateaddtwo)){
                    echo $updateaddtwo;
                }
                if(isset($updateaddthree)){
                    echo $updateaddthree;
                }


                ?>
                <tr>
                    <td>
                        <label>Add One Link</label>
                    </td>
                    <td> 
                    <input type="text" placeholder="Enter Add one link"  name="add1link" value="<?php echo $fetchadd['add1link'] ?>" class="medium"  />
                    
                    </td>
                    <td>
                        <label>Add One Banner</label>
                    </td>
                    <td>
    
                    <input type="file" name="add1banner">
                    <br>
                    <img width="100px" src="upload/<?php echo $fetchadd['add1banner']; ?>" alt="">
                    </td>
                   
                    </td>
                    <td><input type="submit" name='submit1' value="submit">
                    </td>
                 
                </tr>
                
                <tr>
                    <td>
                        <label>Add Two Link</label>
                    </td>
                    <td> 
                    <input type="text" placeholder="Enter Add two link"  name="add2link" class="medium" value="<?php echo $fetchadd['add2link'] ?>" />
                    </td>
                    <td>
                        <label>Add Two Banner</label>
                    </td>
                    <td>
    
                    <input type="file" name="add2banner">
                    <br>
                    <img width="100px" src="upload/<?php echo $fetchadd['add2banner']; ?>" alt="">
                    </td>
                   
                    </td>
                    <td><input type="submit" name='submit2' value="submit">
                    </td>
                 
                </tr>
                
                <tr>
                    <td>
                        <label>Add Three Link</label>
                    </td>
                    <td> 
                    <input type="text" placeholder="Enter Add three link"  name="add3link" class="medium" value="<?php echo $fetchadd['add3link'] ?>" />
                    </td>
                    <td>
                        <label>Add Three Banner</label>
                    </td>
                    <td>
    
                    <input type="file" name="add3banner">
                    <br>
                    <img width="100px" src="upload/<?php echo $fetchadd['add3banner']; ?>" alt="">
                    </td>
                   
                    </td>
                    <td><input type="submit" name='submit3' value="submit">
                    </td>
                 
                </tr>
				 
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>