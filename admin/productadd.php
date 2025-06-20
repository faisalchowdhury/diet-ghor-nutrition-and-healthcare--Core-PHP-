<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
$product = new Productclass;

if(isset($_POST['submit'])){

    $productadd = $product->productadd($_POST,$_FILES);

}

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
      <p style='color:orange;text-align:center;padding-top:10px'>
      <?php 
        
        if(isset($productadd)){
            echo $productadd;
        }

        ?>
      </p>
        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name='productname' placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                    <select id="select" name="catid">
                    <option>Select Category</option>
                    <?php 

                    $getproductcategory = $product->getproductcategory();
                    
                    while($fetchcategory = mysqli_fetch_array($getproductcategory)){
                        ?>
                            
                            <option value="<?php echo $fetchcategory['catid']; ?>"><?php echo $fetchcategory['category']; ?></option>
                            
                       

                        <?php
                    }
                    ?>
                     </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                       <input type="text" name='brandname' placeholder="Brand Name">
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name='description'></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name='price' placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name='image'  />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Weight</label>
                    </td>
                    <td>
                        <input type="text" name='weigth' placeholder="weight ( KG )" >  (If It Is Under 1kg then use float Number . <i>Example '0.500'</i>)
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


