<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="css/cal.css"; >

<?php 

if(isset($_POST['submit'])){
   $calculator = new Calculatorclass;
   $bmr = $calculator->bmr($_POST);
   
}


?>





<div class="container register">
<div class="row">
<div class="col-md-3 register-left">
<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
<h3>Calculate Your Basal Metabolic Rate & Calorie Requirements</h3>


<p>The basal metabolic rate (BMR) and calorie calculator is an excellent tool for estimating how many calories your body needs on a daily basis depending on the amount and intensity of your exercise regime.</p>
</div>
<div class="col-md-9 register-right">

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3 class="register-heading">BMR Calculator</h3>
        <div class="row register-form">
            <div class="col-md-12">
            
            <?php 
            if(isset($bmr)){
                echo $bmr;
            }
            ?>
           
                <form action="" method="POST" >
              
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Bodyweight (in kgs): *" value=""  name='weight' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Height (in cm): *" value="" name='height' required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Enter Your Age (in years): *" value="" name='age'  required/>
                </div>
                <div class="form-group">
                <select class="form-control" name='activity' required>
                        
                        <option value="1.2" selected>I am sedentary (little or no exercise)</option>
                        <option value="1.375">I am lightly active (light exercise/sports 1-3 days/week)</option>
                        <option value="1.55">I am moderately active (moderate exercise/sports 3-5 days/week)</option>
                        <option value="1.725">I am very active (hard exercise/sports 6-7 days a week) </option>
                        <option value="1.9">I am extra active (very hard exercise/sports & physical job or 2x training)</option>

                    </select>  
                </div>
                <div class="form-group">
                    <div class="maxl">
                      <h5>  Gender :</h5> 
                        <label class="radio inline"> 
                            <input  type="radio" name="gender" value="male" checked required>
                            <span> Male </span> 
                        </label>
                        <label class="radio inline"> 
                            <input type="radio" name="gender" value="female" required>
                            <span>Female </span> 
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="maxl">
                       <h5> Goal : </h5>
                       
                        <label class="radio inline"> 
                            <input  type="radio" name="goal" value="maintain" checked required>
                            <span> Maintain Current Weight </span> 
                        </label>
                        <br>
                        <label class="radio inline"> 
                            <input type="radio" name="goal" value="lose" required>
                            <span>Lose Weight </span> 
                        </label>
                        <br>
                        <label class="radio inline"> 
                            <input type="radio" name="goal" value="gain" required>
                            <span>Gain Weight </span> 
                        </label>
                    </div>
                </div>
                
                
                
                <input type="submit" name="submit" class="btnRegister"  value="Calculate"/>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>


</div>
<br>

<?php include "inc/footer.php"; ?>