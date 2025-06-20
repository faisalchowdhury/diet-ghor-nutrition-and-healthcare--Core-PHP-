<?php include "inc/header.php" ;?>

<?php

$contact = new Contactclass;

if(isset($_POST['submit'])){
    
$insertmsg = $contact->insertmsg($_POST);

}

?>




<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="POST">
                <h3>Drop Us a Message</h3>
                <?php 
                
                if(isset($insertmsg)){
                    echo $insertmsg;
                }
                
                ?>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="massage" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>

<?php include "inc/footer.php" ;?>