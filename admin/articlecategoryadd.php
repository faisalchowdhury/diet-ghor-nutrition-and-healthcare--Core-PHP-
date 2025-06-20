<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Article Category</h2>
        <div class="block sloginblock">
        
        <?php 
        
        

        if (isset($_POST['save'])){
            $blog = new Blogclass;
            $articlecategoryadd = $blog->articlecategoryadd($_POST);
        }
        ?>
       
         <form method="POST">
         
            <table class="form">
            <?php 

            if(isset($articlecategoryadd)){
            echo $articlecategoryadd;
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