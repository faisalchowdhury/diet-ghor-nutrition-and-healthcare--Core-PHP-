<?php
namespace database; 
      
      class Db{

      public function dbcon(){



      $host = "localhost";
      $user = 'root';
      $pass = '';
      $db = 'gym';

      return $con = mysqli_connect($host,$user,$pass,$db);

      if($con){

      echo ' db connected';

      } else {

      echo 'something went worng';

      }   



      }


      }



      ?>