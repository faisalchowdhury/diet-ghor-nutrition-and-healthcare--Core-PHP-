<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php

use database\Db;

class Generalclass {

    /**Get General Settings Data */
    public function getgeneral(){

        $select = "SELECT * FROM dg_general WHERE generalid='1'";
        return $query = mysqli_query(db::dbcon(),$select);
    }


    /**Update General  */

    public function updategeneral($data,$file){
      
        $title = $data['title'];
        $topbaremail = $data['topbaremail'];
        $topbarmobile = $data['topbarmobile'];
        
        $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );

        $fileicon = $file['flaticon'];
        $flaticonname = $fileicon['name'];
        $flaticontmp = $fileicon['tmp_name'];

        $divflaticon = explode('.' , $flaticonname );
        $flaticonexe = strtolower(end($divflaticon));
        $uniqueflaticonimg = md5(time()).$flaticonname;
        $uploadflaticon = "upload/".$uniqueflaticonimg;
    
        $filelogo = $file['logo'];
        $logoname = $filelogo['name'];
        $logotmp = $filelogo['tmp_name'];


       $divlogo = explode('.' , $logoname );
       $logoexe = strtolower(end($divlogo));
       $uniquelogoimg = md5(time()).$logoname;
       $uploadlogo = "upload/".$uniquelogoimg;



       if((empty($flaticonname)) && (empty($logoname))){
            /** */

            $update ="UPDATE dg_general SET title='$title' , topbaremail='$topbaremail' ,topbarmobile='$topbarmobile' WHERE generalid='1' ";
            $query = mysqli_query(db::dbcon(),$update);   
    


            
       }else if(empty($logoname) ){
        /** */
        if(in_array($flaticonexe ,$parmited)){
            move_uploaded_file($flaticontmp , $uploadflaticon);
            $update ="UPDATE dg_general SET title='$title' ,flaticon ='$uniqueflaticonimg',topbaremail='$topbaremail' ,topbarmobile='$topbarmobile' WHERE generalid='1' ";  
            $query = mysqli_query(db::dbcon(),$update);  

    
   }else{

     return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";

      }

       }else if(empty($flaticonname)) {

        if(in_array($logoexe ,$parmited)){
            move_uploaded_file($logotmp , $uploadlogo);
            $update ="UPDATE dg_general SET title='$title' ,logo ='$uniquelogoimg',topbaremail='$topbaremail' ,topbarmobile='$topbarmobile' WHERE generalid='1' ";  
            $query = mysqli_query(db::dbcon(),$update);  

    
   }else{

     return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";

      }
       




       }else {
         /** */
if(in_array($flaticonexe ,$parmited) && in_array($logoexe ,$parmited)){
    move_uploaded_file($flaticontmp , $uploadflaticon);
    move_uploaded_file($logotmp , $uploadlogo);
$update ="UPDATE dg_general SET flaticon='$uniqueflaticonimg', title='$title' ,logo='$uniquelogoimg',topbaremail='$topbaremail' ,topbarmobile='$topbarmobile' WHERE generalid='1' ";  
$query = mysqli_query(db::dbcon(),$update);  


}else{

return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";

}    
    }


}



/**Get Social  */

public function getsocial(){
    $select = "SELECT * FROM dg_social WHERE socialid='1'";
    return $query = mysqli_query(db::dbcon(),$select);
}

/**Update Social  */

public function updatesocial($data){
    $facebook  = $data['facebook'];
    $instagram = $data['instagram'];
    $youtube = $data['youtube'];

    $update = "UPDATE dg_social SET facebook='$facebook' , instagram = '$instagram' ,youtube='$youtube' WHERE socialid='1' ";
    $query = mysqli_query(db::dbcon(),$update);
}




/**Search Product /blog /profile */

public function searchproduct($search){
    $select = "SELECT * FROM dg_product WHERE productname LIKE '%$search%' OR description LIKE '%$search%'";

    return $query = mysqli_query(db::dbcon(),$select);


}

//search blog 

public function searchblog($search){

    $select = "SELECT * FROM dg_blog WHERE title LIKE '%$search%' OR description LIKE '%$search%' AND  type = 'blog'";

    return $query = mysqli_query(db::dbcon(),$select);

}

//search Workout
public function searchworkout($search){

    $select = "SELECT * FROM dg_blog WHERE title LIKE '%$search%' OR description LIKE '%$search%' AND  type = 'workout'";

    return $query = mysqli_query(db::dbcon(),$select);

}

//search trainer

public function searchtrainer($search){

    $select = "SELECT * FROM dg_trainer WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' AND status='confirm' ";

    return $query = mysqli_query(db::dbcon(),$select);

}


// Subscribe 

public function subscribe($data){
    $email = mysqli_real_escape_string(db::dbcon(),$data['email']);
    $select = "SELECT * FROM dg_subscribe WHERE email='$email'";
    $selectquery = mysqli_query(db::dbcon(),$select);
     
    if(mysqli_num_rows($selectquery) > 0){
     return $msg = "<span style='color:green'> You Already Subscribe ! </span>";
    }else{
    $insert = "INSERT INTO dg_subscribe (email) VALUES ('$email')";
    $query = mysqli_query(db::dbcon(),$insert);
    return $msg = "<span style='color:green'> Thanks for Subscribe us ! </span>";
    }
    
}

// Get Subscriber for backend

public function subscriber(){
    $select = "SELECT * FROM dg_subscribe";
    return $query = mysqli_query(db::dbcon(),$select);
}

// Delete Subscriber 

public function delsubscriber($subid){
    $delete = "DELETE FROM dg_subscribe WHERE subscriberid='$subid'";
    $query = mysqli_query(db::dbcon(),$delete);
}


// Get Slider

public function getslider(){
  $select = "SELECT * FROM dg_slider WHERE sliderid='1'";
  return $query = mysqli_query(db::dbcon(),$select);
}

// update slider

public function updateslider($data,$file){

$slidertext = mysqli_real_escape_string(db::dbcon(),$data['slidertext']);

$parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );

// slider one
$fileslider1 = $file['slider1'];
$slider1name = $fileslider1['name'];
$slider1tmp = $fileslider1['tmp_name'];

$divslider1 = explode('.' , $slider1name );
$slider1exe = strtolower(end($divslider1));
$uniqueslider1img = md5(time()).$slider1name;
$uploadslider1 = "upload/".$uniqueslider1img;

// slider two 

$fileslider2 = $file['slider2'];
$slider2name = $fileslider2['name'];
$slider2tmp = $fileslider2['tmp_name'];

$divslider2 = explode('.' , $slider2name );
$slider2exe = strtolower(end($divslider2));
$uniqueslider2img = md5(time()).$slider2name;
$uploadslider2 = "upload/".$uniqueslider2img;


// slider Three

$fileslider3 = $file['slider3'];
$slider3name = $fileslider3['name'];
$slider3tmp = $fileslider3['tmp_name'];

$divslider3 = explode('.' , $slider3name );
$slider3exe = strtolower(end($divslider3));
$uniqueslider3img = md5(time()).$slider3name;
$uploadslider3 = "upload/".$uniqueslider3img;



  
if((empty($slider1name)) || (empty($slider2name)) || (empty($slider3name)) || (empty($slidertext))){
    /////////////////////////////////////////////////////
    
    return $msg = "File Must Not be empty'";    
  
 }else{
   //////////////////////////////////////////////////////////
   if(in_array($slider1exe ,$parmited) && in_array($slider2exe ,$parmited) && in_array($slider3exe ,$parmited)){
    move_uploaded_file($slider1tmp , $uploadslider1);
    move_uploaded_file($slider2tmp , $uploadslider2);
    move_uploaded_file($slider3tmp , $uploadslider3);
    
    $update ="UPDATE dg_slider SET slidertext='$slidertext' , slider1='$uniqueslider1img', slider2='$uniqueslider2img', slider3='$uniqueslider3img' WHERE sliderid='1' ";
    $query = mysqli_query(db::dbcon(),$update); 
    return $msg = "slider updated";    
    }else{
        return $msg = "This file is not 'jpg' , 'png' ,'jpeg'"; 
    }

 }

}

// bkash number and description

public function getbkash(){
    $select = "SELECT * FROM dg_bkash WHERE id = '1'";
    return $query = mysqli_query(db::dbcon(),$select);
}


//update  bkash number and description
public function updatebkash($data){
    $bkash = $data['bkash'];
    $update = "UPDATE dg_bkash SET bkash='$bkash'";
    $query = mysqli_query(db::dbcon(),$update);
    if($query){
        header('Location: bkash.php');
    }
}

// Add Slot

/// Add Slot One

public function updateaddone($data,$file){
    $add1link = mysqli_real_escape_string(db::dbcon() ,$data['add1link']);
   
    $file = $file['add1banner'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    
    $div = explode('.' , $filename );
    $exe = strtolower(end($div));
    $uniqueimg = md5(time()).$filename;
    $upload = "upload/".$uniqueimg;
    
    if(empty($add1link) || empty($filename)){
        return $msg = "<span style='color:red;'>Field Must Not be Empty</span>";
    }else{
        move_uploaded_file($filetmp , $upload);
        $update = "UPDATE dg_addslot SET add1link='$add1link' ,add1banner='$uniqueimg' WHERE addslotid='1' ";
        $query = mysqli_query(db::dbcon(),$update);
        return $msg = "<span style='color:green;'>Add Added";
    }

}

/// Add Slot two

public function updateaddtwo($data,$file){
    $add2link = mysqli_real_escape_string(db::dbcon() ,$data['add2link']);
   
    $file = $file['add2banner'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    
    $div = explode('.' , $filename );
    $exe = strtolower(end($div));
    $uniqueimg = md5(time()).$filename;
    $upload = "upload/".$uniqueimg;
    
    if(empty($add2link) || empty($filename)){
        return $msg = "<span style='color:red;'>Field Must Not be Empty</span>";
    }else{
        move_uploaded_file($filetmp , $upload);
        $update = "UPDATE dg_addslot SET add2link='$add2link' ,add2banner='$uniqueimg' WHERE addslotid='1' ";
        $query = mysqli_query(db::dbcon(),$update);
        return $msg = "<span style='color:green;'>Add Added";
    }

}


/// Add Slot three

public function updateaddthree($data,$file){
    $add3link = mysqli_real_escape_string(db::dbcon() ,$data['add3link']);
   
    $file = $file['add3banner'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    
    $div = explode('.' , $filename );
    $exe = strtolower(end($div));
    $uniqueimg = md5(time()).$filename;
    $upload = "upload/".$uniqueimg;
    
    if(empty($add3link) || empty($filename)){
        return $msg = "<span style='color:red;'>Field Must Not be Empty</span>";
    }else{
        move_uploaded_file($filetmp , $upload);
        $update = "UPDATE dg_addslot SET add3link='$add3link' ,add3banner='$uniqueimg' WHERE addslotid='1' ";
        $query = mysqli_query(db::dbcon(),$update);
        return $msg = "<span style='color:green;'>Add Added";
    }

}

/// get Add 
public function getadd(){
    $select = "SELECT * FROM dg_addslot WHERE addslotid= '1'";
    return $query = mysqli_query(db::dbcon(),$select);
}

// Get Footer

public function getfooter(){
    $select = "SELECT * FROM dg_footer WHERE id='1'";
    return $query = mysqli_query(db::dbcon(),$select);
}

// Update Footer 

public function updatefooter($data){

    $aboutus = $data['aboutus'];
    $contactus = $data['contactus'];

    $update = "UPDATE dg_footer SET aboutus='$aboutus' , contactus='$contactus' WHERE id='1'";
    $query = mysqli_query(db::dbcon(),$update);
    return $msg = "<span style='color:green;'>Updated Successfully </span>";
    if($query){
        header('Location: footer.php');
        

    }


}


}
