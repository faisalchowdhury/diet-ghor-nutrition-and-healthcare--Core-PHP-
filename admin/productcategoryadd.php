<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Product Category</h2>
        <div class="block sloginblock">
        
        <?php 
        
        

        if (isset($_POST['save'])){
            $product = new Productclass;
            $productcategoryadd = $product->productcategoryadd($_POST);
        }
        ?>
       
         <form method="POST">
         
            <table class="form">
            <?php 

            if(isset($productcategoryadd)){
            echo $productcategoryadd;
            }

            ?>					
                <tr>
                    <td>
                        <label>Category Name</label>
                    </td>
                    <td>
                        <input type="text" value="" placeholder=""  name="category" class="medium" required />
                    </td>
                </tr>
				 
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="save" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>