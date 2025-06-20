
<?php 
 $filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../database/Config.php");
 ?>
 

<?php
use database\Db;

class Productclass {

    //Product Category Add 
    public function productcategoryadd($data){
        $category = mysqli_real_escape_string(db::dbcon(),$data['category']);
        $select = "SELECT * FROM dg_product_category";
        $selectquery = mysqli_query(db::dbcon(),$select);
        
        while($fetchcategory = mysqli_fetch_array($selectquery)){
            $checkcat = $fetchcategory['category']; 
        }
       
        if($checkcat === $category){
            return $msg = "<span style='color:red;'>'category' already added </sapn>"; 
        }else if ($checkcat != $category){
            $insert = "INSERT INTO dg_product_category (category) VALUES('$category') ";
            $query = mysqli_query(db::dbcon(),$insert);
    
        }
        
        if($query){
          return $msg = "<span style='color:green;'>Category Added </sapn>";
          
        }
    }

    //Get Product Category 

    public function getproductcategory(){
        $select = "SELECT * FROM dg_product_category ";
        return $query = mysqli_query(db::dbcon(),$select);
    }

    //get Category for edit

    public function getforedit($catid){
    $select = "SELECT * FROM dg_product_category WHERE catid='$catid'";
    return $query = mysqli_query(db::dbcon(),$select);
    }

    //update category 

    public function updatecategory($data){
        $catid = mysqli_real_escape_string(db::dbcon(),$data['catid']);
        $category = mysqli_real_escape_string(db::dbcon(),$data['category']);

        $update = "UPDATE dg_product_category SET category = '$category' WHERE catid='$catid'";
        $query = mysqli_query(db::dbcon(),$update);

        if($query){
            return $msg = "<span style='color:green;'>Category Updated </sapn>";
        }
    }

 // Delete Product Category 

 public function delproductcat($catid){
     $delete = "DELETE FROM dg_product_category WHERE catid='$catid'";
     $query = mysqli_query(db::dbcon(),$delete);
 }


////////////////////////////Product Section ////////////////////////////

//Add Product 

public function productadd($data,$file){
       $productname = mysqli_real_escape_string(db::dbcon(),$data['productname']);
        $catid = mysqli_real_escape_string(db::dbcon(),$data['catid']);
        $brandname = mysqli_real_escape_string(db::dbcon(),$data['brandname']);
        $description = mysqli_real_escape_string(db::dbcon(),$data['description']);
        $price = mysqli_real_escape_string(db::dbcon(),$data['price']);
        $weight = mysqli_real_escape_string(db::dbcon(),$data['weigth']);
       

        $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );
        $file = $file['image'];
        $filename = $file['name'];
        $filesize = $file['size'];
        $filetmp = $file['tmp_name'];

       $div = explode('.' , $filename );
       $fileexe = strtolower(end($div));
       $uniqueimg = md5(time()).$filename;
       $upload = "upload/".$uniqueimg;

       if($productname == "" || $catid == '' || $brandname == '' || $description == '' ||  $price == '' || $weight == '' || $uniqueimg == '' ){

        return $productmsg = "Field Must Not be Empty";

    }else{
       if(in_array($fileexe ,$parmited)){
        move_uploaded_file($filetmp , $upload);
        
       $insert = "INSERT INTO dg_product (productname, catid, brandname, description, price, image, weight) VALUES ('$productname','$catid','$brandname','$description','$price','$uniqueimg' ,'$weight')";

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

//Get All Products

public function getproduct(){

    $select = "SELECT
    dg_product.*,
    dg_product_category.category
  FROM
    dg_product
    INNER JOIN dg_product_category ON dg_product.catid = dg_product_category.catid
    ORDER BY
    dg_product.productid DESC";

   return $query = mysqli_query(db::dbcon(),$select);
    

}


//Get Product For Edit 

public function geteditproduct($proid){
    $select = "SELECT
    dg_product.*,
    dg_product_category.category
  FROM
    dg_product
    INNER JOIN dg_product_category ON dg_product.catid = dg_product_category.catid WHERE productid= '$proid'";

    return $query = mysqli_query(db::dbcon(),$select);

}

// Product Update

public function productupdate($data,$file){
    $proid = $data['proid'];
    $productname = mysqli_real_escape_string(db::dbcon(),$data['productname']);
    $catid = mysqli_real_escape_string(db::dbcon(),$data['catid']);
    $brandname = mysqli_real_escape_string(db::dbcon(),$data['brandname']);
    $description = mysqli_real_escape_string(db::dbcon(),$data['description']);
    $price = mysqli_real_escape_string(db::dbcon(),$data['price']);
    $weight = mysqli_real_escape_string(db::dbcon(),$data['weigth']);
   

    $parmited = array('jpg' , 'png' ,'jpeg' ,'jfif' );
    $file = $file['image'];
    $filename = $file['name'];
    $filesize = $file['size'];
    $filetmp = $file['tmp_name'];

   $div = explode('.' , $filename );
   $fileexe = strtolower(end($div));
   $uniqueimg = md5(time()).$filename;
   $upload = "upload/".$uniqueimg;

   if($productname == "" || $catid == '' || $brandname == '' || $description == '' ||  $price == '' || $weight == ''  ){

    return $productmsg = "Field Must Not be Empty";

   }else{
   
    
   if(empty($filename)){

    $update = "UPDATE dg_product SET productname='$productname' , catid='$catid' , brandname='$brandname' ,description='$description' , price='$price' ,weight='$weight' WHERE productid='$proid' ";
   
   }else{
    if(in_array($fileexe ,$parmited)){
        move_uploaded_file($filetmp , $upload);
    $update = "UPDATE dg_product SET productname='$productname' , catid='$catid' , brandname='$brandname' ,description='$description' , price='$price' ,image='$uniqueimg' ,weight='$weight' WHERE productid='$proid'";
    
  
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

}


// Delete Product 

public function delproduct($proid){
    $delete = "DELETE FROM dg_product WHERE productid='$proid'";
    $query = mysqli_query(db::dbcon(),$delete);

}


//Get Product For Front End 

public function getfrontendproduct(){

    $select = "SELECT * FROM dg_product ORDER BY productid DESC LIMIT 7 ";
    return $query = mysqli_query(db::dbcon(),$select);
}

//Get product Details

public function getproductdetails($proid){
    $select = "SELECT
    dg_product.*,
    dg_product_category.category
  FROM
    dg_product
    INNER JOIN dg_product_category ON dg_product.catid = dg_product_category.catid WHERE productid= '$proid'";

    return $query = mysqli_query(db::dbcon(),$select);

}

// Product For Product Page

public function getallproduct(){
    $select ="SELECT * FROM dg_product";
    return $query = mysqli_query(db::dbcon(),$select);
}

// Get Product By Category 

public function productbycat($catid){

    $select = "SELECT * FROM dg_product WHERE catid='$catid'";
    return $query = mysqli_query(db::dbcon(),$select);

}
public function relatedproduct($catid){
    $select = "SELECT * FROM dg_product WHERE catid='$catid' LIMIT 4";
    return $query = mysqli_query(db::dbcon(),$select);
  
}

}
