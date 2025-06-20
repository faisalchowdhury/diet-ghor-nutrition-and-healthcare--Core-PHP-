
<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php
use database\Db;

class Calculatorclass {

    // BMR Calculator
    public function bmr($data){
      $weight = mysqli_real_escape_string(db::dbcon(),$data['weight']);
      $height = mysqli_real_escape_string(db::dbcon(),$data['height']);
      $age = mysqli_real_escape_string(db::dbcon(),$data['age']);
      $gender = mysqli_real_escape_string(db::dbcon(),$data['gender']);
      $activity = mysqli_real_escape_string(db::dbcon(),$data['activity']);
      $goal = mysqli_real_escape_string(db::dbcon(),$data['goal']);
      
      if(is_numeric($weight) || is_numeric($height) || is_numeric($age) ){

        if($gender == 'male'){
            if($goal == 'maintain'){
              $bmr = (10*$weight)+(6.25*$height)-(5*$age)+5;
              $bmractivity = $bmr*$activity;
 
              return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";
              
            }elseif ($goal == 'lose' ){
              $bmr = 10*$weight+6.25*$height-5*$age+5;
              $bmractivity = $bmr*$activity;
              $bmractivity =  round($bmractivity * ((100-15) / 100), 2);
 
              return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";

              }elseif ($goal == 'gain' ){
                $bmr = 10*$weight+6.25*$height-5*$age+5;
                $bmractivity = $bmr*$activity;
                $bmractivity = $bmractivity + 500 ;
   
                return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";
                }

    
          }elseif ($gender == 'female'){
          
            if($goal == 'maintain'){
              $bmr = 10*$weight+6.25*$height-5*$age-161;
              $bmractivity = $bmr*$activity;
 
              return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";
              
            }elseif ($goal == 'lose' ){
              $bmr = 10*$weight+6.25*$height-5*$age-161;
              $bmractivity = $bmr*$activity;
              $bmractivity =  round($bmractivity * ((100-20) / 100), 2);
 
              return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";

              }elseif ($goal == 'gain' ){
                $bmr = 10*$weight+6.25*$height-5*$age-161;
                $bmractivity = $bmr*$activity;
                $bmractivity = $bmractivity + 500 ;
   
                return $bmr = "<h4 class='bg-success text-white p-2 text-center'>YOUR DAILY CALORIE REQUIREMENTS ARE:".$bmractivity." <br/> CALORIES PER DAY</h4>";
                }



   
          }
          

      }else{
        return $bmr = "<h4 class='bg-success text-white p-2 text-center'>Put Numeric Value </h4>"  ;
      }

    
    }
}