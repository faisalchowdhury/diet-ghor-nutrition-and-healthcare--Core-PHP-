
<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php"); ?>

<?php
use database\Db;

class Blogclass {

      //Article Category Add 
      public function articlecategoryadd($data){
        $category = mysqli_real_escape_string(db::dbcon(),$data['category']);
        $select = "SELECT * FROM dg_article_category";
        $selectquery = mysqli_query(db::dbcon(),$select);
        
        while($fetchcategory = mysqli_fetch_array($selectquery)){
            $checkcat = $fetchcategory['category']; 
        }
       
        if($checkcat === $category){
            return $msg = "<span style='color:red;'>'category' already added </sapn>"; 
        }else if ($checkcat != $category){
            $insert = "INSERT INTO dg_article_category (category) VALUES('$category') ";
            $query = mysqli_query(db::dbcon(),$insert);
    
        }
        
        if($query){
          return $msg = "<span style='color:green;'>Category Added </sapn>";
          
        }
    }

    //Get Article Category 

    public function getarticlecategory(){
        $select = "SELECT * FROM dg_article_category ";
        return $query = mysqli_query(db::dbcon(),$select);
    }

    //Get Article for Blog Category 

    public function getblogcategory(){
        $select = "SELECT
        dg_blog.*,
        dg_article_category.category
      FROM
        dg_blog
        INNER JOIN dg_article_category ON dg_blog.catid = dg_article_category.catid WHERE dg_blog.type='blog'
        ORDER BY
        dg_blog.blogid DESC";
        return $query = mysqli_query(db::dbcon(),$select);
    }

     //Get Article for Workout Category 

     public function getworkoutcategory(){
        $select = "SELECT
        dg_blog.*,
        dg_article_category.category
      FROM
        dg_blog
        INNER JOIN dg_article_category ON dg_blog.catid = dg_article_category.catid WHERE dg_blog.type='workout'
        ORDER BY
        dg_blog.blogid DESC";
        return $query = mysqli_query(db::dbcon(),$select);
    }

    //get Category for edit

    public function getforedit($catid){
    $select = "SELECT * FROM dg_article_category WHERE catid='$catid'";
    return $query = mysqli_query(db::dbcon(),$select);
    }

    //update category 

    public function updatecategory($data){
        $catid = mysqli_real_escape_string(db::dbcon(),$data['catid']);
        $category = mysqli_real_escape_string(db::dbcon(),$data['category']);

        $update = "UPDATE dg_article_category SET category = '$category' WHERE catid='$catid'";
        $query = mysqli_query(db::dbcon(),$update);

        if($query){
            return $msg = "<span style='color:green;'>Category Updated </sapn>";
        }
    }

 // Delete Product Category 

 public function delarticlecat($catid){
     $delete = "DELETE FROM dg_article_category WHERE catid='$catid'";
     $query = mysqli_query(db::dbcon(),$delete);
 }








    /////////////////////////////////////////////////////////////

    /**Add Blog  */

    public function addblog($data ,$file){
        $title = $data['title'];
        $catid = $data['catid'];
        $description = $data['description'];
        $type = $data['type'];
        $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );
        $file = $file['image'];
        $filename = $file['name'];
        $filesize = $file['size'];
        $filetmp = $file['tmp_name'];

       $div = explode('.' , $filename );
       $fileexe = strtolower(end($div));
       $uniqueimg = md5(time()).$filename;
       $upload = "upload/".$uniqueimg;

       if($title == "" || $description == '' || $type == '' || $filename == '' || $catid == '' ){

        return $productmsg = "Field Must Not be Empty";

    }else{
       if(in_array($fileexe ,$parmited)){
        move_uploaded_file($filetmp , $upload);
        
       $insert = "INSERT INTO dg_blog (title,catid, description, featureimage,type) VALUES ('$title','$catid','$description','$uniqueimg','$type ')";

       $query = mysqli_query(db::dbcon() ,$insert );

        if($query){

            return $productmsg = "Data Inserted"; 
        }else{
            return $productmsg = "Data not Inserted"; 
        }


       }else{

        return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";
       }
    }

    }


 /**Get Blog for boglist*/

 public function getblog(){
     $select = "SELECT * FROM dg_blog ORDER BY blogid DESC";
     return $query = mysqli_query(db::dbcon(),$select);
 }


 /**Fetch Blog  */

 public function fetchblog($blogid){
   $select = "SELECT * FROM dg_blog WHERE blogid='$blogid' ORDER BY blogid DESC";
   return $query = mysqli_query(db::dbcon(),$select);
 }

 
 /**Fetch workout  */

 public function fetchworkout($workoutid){
    $select = "SELECT * FROM dg_blog WHERE blogid='$workoutid' ORDER BY blogid DESC";
    return $query = mysqli_query(db::dbcon(),$select);
  }
 


 /**Update Blog */

 public function updateblog($data,$file){ 
    $blogid = $data['blogid'];
    $title = $data['title'];
    $catid = $data['catid'];
    $description = $data['description'];


    $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );
    $file = $file['image'];
    $filename = $file['name'];
    $filesize = $file['size'];
    $filetmp = $file['tmp_name'];

   $div = explode('.' , $filename );
   $fileexe = strtolower(end($div));
   $uniqueimg = md5(time()).$filename;
   $upload = "upload/".$uniqueimg;


   
    
   if(empty($filename)){

    $update = "UPDATE dg_blog SET title='$title' ,catid='$catid', description='$description'  WHERE blogid='$blogid' ";
   
   }else{
    if(in_array($fileexe ,$parmited)){
        move_uploaded_file($filetmp , $upload);
    $update = "UPDATE dg_blog SET title='$title' ,catid='$catid', description='$description' , featureimage='$uniqueimg'  WHERE blogid='$blogid'";
    
  
   }else{

    return $productmsg = "This file is not 'jpg' , 'png' ,'jpeg'";
  
   }
   }
   $query = mysqli_query(db::dbcon() ,$update );

    if($query){

        return $productmsg = "Data Updated Successfully"; 
    }else{
        return $productmsg = "Data not Updated"; 
    }





}


/** Delete Blog */

public function delblog($blogid){

    $delete = "DELETE FROM dg_blog WHERE blogid='$blogid'";
    $query = mysqli_query(db::dbcon(),$delete);
}


/** Front View Blog */

public function frontblog(){

    $select = "SELECT * FROM dg_blog WHERE type = 'blog' LIMIT 4";
    return $query = mysqli_query(db::dbcon(),$select);



}

// All Blog 
public function allblog(){

    $select = "SELECT * FROM dg_blog WHERE type = 'blog' ORDER BY blogid DESC ";
    return $query = mysqli_query(db::dbcon(),$select);

}

// Blog By category 

public function blogbycat($catid){
     $select = "SELECT * FROM dg_blog WHERE type = 'blog' AND catid = '$catid'";
     return $query = mysqli_query(db::dbcon(),$select);
}

// Workout By category 

public function workoutbycat($catid){
    $select = "SELECT * FROM dg_blog WHERE type = 'workout' AND catid = '$catid'";
    return $query = mysqli_query(db::dbcon(),$select);
}


// Random blogs 

public function randomblog(){

    $select = "SELECT * FROM dg_blog WHERE type = 'blog' ORDER BY RAND()
    LIMIT 4";
    return $query = mysqli_query(db::dbcon(),$select);



}
// Random blogs 

public function randomworkout(){

    $select = "SELECT * FROM dg_blog WHERE type = 'workout' ORDER BY RAND()
    LIMIT 3";
    return $query = mysqli_query(db::dbcon(),$select);



}


// get Workout blogs 

public function getworkout(){

    $select = "SELECT * FROM dg_blog WHERE type = 'workout' LIMIT 6";
    return $query = mysqli_query(db::dbcon(),$select);



}
// All workout 
public function allworkout(){

    $select = "SELECT * FROM dg_blog WHERE type = 'workout'  ";
    return $query = mysqli_query(db::dbcon(),$select);



}



}