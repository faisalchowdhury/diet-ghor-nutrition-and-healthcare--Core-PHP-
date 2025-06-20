<?php include 'inc/header.php';?>
        <?php include 'inc/sidebar.php';?>
        


       <?php 
       
       $blog = new Blogclass();

       if (isset($_POST['submit'])){
         
        $addblog = $blog->addblog($_POST,$_FILES);
       
       }

       
       
       ?>




        <div class="grid_10">
        <div class="box round first grid">
        <h2>Add New Blog</h2>
        <div class="block">               
        <form action="" method="POST" enctype="multipart/form-data">
        <span style="color : orange ;">
        <?php 
        
        if(isset($addblog)){
            echo  $addblog;
        }
        
        ?>
        </span>
        <table class="form">

        <tr>
        <td>
        <label>Blog Title</label>
        </td>
        <td>
        <input type="text" name="title" placeholder="Enter Your Blog Title..." class="medium" />
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

                    $getarticlecategory = $blog->getarticlecategory();
                    
                    while($fetchcategory = mysqli_fetch_array($getarticlecategory)){
                        ?>
                            
                            <option value="<?php echo $fetchcategory['catid']; ?>"><?php echo $fetchcategory['category']; ?></option>
                            
                       

                        <?php
                    }
                    ?>
                     </select>
                    </td>
                </tr>

        <tr>
        <td style="vertical-align: top; padding-top: 9px;">
        <label>Description</label>
        </td>
        <td>
        <textarea class="tinymce" name="description"></textarea>
        </td>
        </tr>
        
        <tr>
        <td>
        <label>Feature Image</label>
        </td>
        <td>
        <input name="image" type="file" />
        </td>
        </tr>

        <tr>
        <td>
        <label>Blog Type</label>
        </td>
        <td>
        <select id="select" name="type">
        <option>Select Type</option>
        <option value="workout">Workout</option>
        <option value="blog">Blog</option>
        </select>
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


