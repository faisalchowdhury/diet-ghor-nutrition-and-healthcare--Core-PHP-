<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product Category</h2>
        <div class="block sloginblock">
        
        <?php 
        
        $product = new Productclass;

        if($_GET['editcat']){
            $catid = $_GET['editcat'];
            $getforedit = $product->getforedit($catid);
            $fetcheditcat = mysqli_fetch_array($getforedit);
        }


        if (isset($_POST['update'])){
            
            $updatecategory = $product->updatecategory($_POST);
            
        }
        ?>
       
         <form method="POST">
         
            <table class="form">
            <?php 

            if(isset($updatecategory)){
            echo $updatecategory;
            }

            ?>					
                <tr>
                    <td>
                        <label>Category Name</label>
                    </td>
                    <td>
                    <input type="hidden" name='catid' value='<?php echo $fetcheditcat['catid']; ?>'>
                        <input type="text" value="<?php echo $fetcheditcat['category']; ?>" placeholder=""  name="category" class="medium" required />
                    </td>
                </tr>
				 
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="update" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>