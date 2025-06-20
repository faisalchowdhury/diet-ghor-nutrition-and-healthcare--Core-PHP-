<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="css/cal.css"; >

<?php 

if(isset($_POST['submit'])){
    $wrist = $_POST['wrist'];
    $ankle = $_POST['ankle'];

    $chest = 6.5 * $wrist ;
    $neck = 0.37 * 6.5 * $wrist;
    $arms = 2.5 * $wrist;
    $waist = 0.7 * 6.5 * $wrist;
    $thigh = 2.9 * $ankle;
    $calves = 1.9 * $ankle;
  
}


?>





<div class="container register">
<div class="row">
<div class="col-md-3 register-left">
<img src="images/bmi.png" alt=""/>
<h3>Ideal Body Measurements Calculator: What Are Your Ideal Proportions?</h3>


<p>What are your ideal body measurements? This ideal body measurements calculator estimates them for you. The calculator is based on the Steve "Hercules" Reeves ideal muscle to bone ratio formula.</p>
</div>
<div class="col-md-9 register-right">

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3 class="register-heading">IDEAL BODY MEASUREMENTS CALCULATOR
</h3>
        <div class="row register-form">
            <div class="col-md-6">
            
           
           
                <form action="" method="POST" >
              
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Wrist Size (cm): *" value=""  name='wrist' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Ankle Size (cm): *" value="" name='ankle' required />
                </div>
               
                <input type="submit" name="submit" class="btnRegister"  value="Calculate"/>
                </form>
            </div>

            <div class="col-md-6">
            <div class="row">
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">NECK: <?php if(isset($neck)){echo $neck.' cm';} ?></div>
            </div>
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">ARMS: 
            <?php if(isset($arms)){echo $arms.' cm';} ?>
            </div>
            </div>
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">CHEST:
            <?php if(isset($chest)){echo $chest.' cm';} ?>
             </div>
            </div>
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">WAIST:
            <?php if(isset($waist)){echo $waist.' cm';} ?>
             </div>
            </div>
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">THIGHS:
            <?php if(isset($thigh)){echo $thigh.' cm';} ?>
             </div>
            </div>
            <div class="col-md-12">
            <div class="bg-success text-white p-2 text-center mb-2">CALVES:
            <?php if(isset($calves)){echo $calves.' cm';} ?>
             </div>
            </div>


            </div>
            
            </div>
        </div>
    </div>
    
</div>
</div>
</div>


</div>
<br>

<?php include "inc/footer.php"; ?>