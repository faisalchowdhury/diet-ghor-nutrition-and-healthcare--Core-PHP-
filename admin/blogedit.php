<?php include 'inc/header.php';?>
        <?php include 'inc/sidebar.php';?>
    

       <?php 
       
       $blog = new Blogclass();

       if (isset($_GET['blogedit'])){
        $blogid = $_GET['blogedit'];
         
        $fetchblog = $blog->fetchblog($blogid);
        $blogrow = mysqli_fetch_array($fetchblog);
       
       }

       if(isset($_POST['submit'])){
          
         $updateblog = $blog->updateblog($_POST,$_FILES); 

       }

     
       
       
       ?>




        <div class="grid_10">
        <div class="box round first grid">
        <h2>Edit Blog</h2>
        <div class="block">               
        <form action="" method="POST" enctype="multipart/form-data">
        <span style="color : orange ;">
        <?php 
          if(isset($updateblog)){
            echo  $updateblog;
        }
        
       
        
        ?>
        </span>
        
        <table class="form">

        <tr>
        <td>
        <label>Blog Title</label>
    
        </td>
        <td>
        <input value="<?php if(isset($blogrow['title'])){echo $blogrow['title'];} ?>" type="text" name="title" placeholder="Enter Your Blog Title..." class="medium" />
        </td>
        </tr>
         <input type="hidden" name="blogid" value="<?php echo $blogrow['blogid']; ?>">
         
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
        <textarea class="tinymce" name="description">
        <?php if(isset($blogrow['description'])){echo $blogrow['description'];} ?>
        </textarea>
        </td>
        </tr>
        
        <tr>
        <td>
        <label>Feature Image</label>
        </td>
        <td>
        <input name="image" type="file" />
        <img style="50px" height="50px" src="upload/<?php if(isset($blogrow['featureimage'])){echo $blogrow['featureimage'];} ?>" alt="">
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


