
<?php include 'inc/header.php';?>
        <?php include 'inc/sidebar.php';?>
        <?php require_once '../classes/Contactclass.php'; ?>
      

       <?php 
       
       $contact = new Contactclass();

       if (isset($_GET['viewid'])){

        $viewid = $_GET['viewid'];

        $viewcontact = $contact->viewcontact($viewid);

        $rowpro = mysqli_fetch_array($viewcontact);
         
        
       }
       

   
       ?>




        <div class="grid_10">
        <div class="box round first grid">
        <h2>Your Message</h2>
        <div class="block">               
        <form action="" method="POST" enctype="multipart/form-data">
       
        <span style="color : orange ;">
      
        </span>
        <table class="form">

        <tr>
        <td>
        <label>Name</label>
        </td>
        <td>
        <input type="text" name="name" value="<?php echo $rowpro['name']; ?>"  class="medium" />
        </td>
        </tr>
    
        <tr>
        <td style="vertical-align: top; padding-top: 9px;">
        <label>Message</label>
        </td>
        <td>
        <textarea class="tinymce" name="body"><?php echo $rowpro['message'];?></textarea>
        </td>
        </tr>
        <tr>
        <td>
        <label>email</label>
        </td>
        <td>
        <input name="Email" type="text" value="<?php echo $rowpro['email']; ?>" class="medium" />
        </td>
        </tr>
        <td>
        <label>Mobile</label>
        </td>
        <td>
        <input name="Phone" type="text" value="<?php echo $rowpro['mobile']; ?>" class="medium" />
        </td>
        <tr>
     
      <td></td>
      <td></td>

        <td>
       
            <a style='background: #d22020;
            padding: 7px;
            color: white;
            border-radius: 3px;'  href="inbox.php">Done</a>
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


