<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 



$name=mysqli_real_escape_string($conn,$_POST['name']);

$email=mysqli_real_escape_string($conn,$_POST['email']);

$profession=mysqli_real_escape_string($conn,$_POST['profession']);

$interest=mysqli_real_escape_string($conn,$_POST['interest']);

$password_1=mysqli_real_escape_string($conn,$_POST['password_1']);

$filename= $_FILES['image']['name'];

$filename_2=$_FILES['image']['tmp_name'];

$filesize=$_FILES['image']['size'];

$image_folder="images/";



$image_src=$image_folder.$filename;
 

$image_extension=strtolower(pathinfo($image_src,PATHINFO_EXTENSION ) );


$image_arr=array("jpg","png","jpeg","gif");

check_file_size();


function check_file_size(){
    $maxsize=35000000000;
    global $filesize;
    
 if(($filesize>=$maxsize)||($filesize==0)){
     echo"file too large or corrupted";
 } else{ check_file_type(); }
   
}


function check_file_type(){
    global $image_extension  ,$image_arr  ;
    
    if(in_array($image_extension,$image_arr)){
        insert_image();
    }
    
    else{echo"file not supported";}
}



function insert_image(){
    global $image_src , $filename_2;
    
 if(move_uploaded_file($filename_2, $image_src)){ insert_sign_up_data(); }
  else { echo ("failed to upload image"); }

}  

  


function insert_sign_up_data(){
 global $conn ,$name , $email ,  $profession ,$interest , $password_1 ,$image_src ;
 
 $sql="INSERT INTO users(name ,email ,profession ,interest ,image_src ,password ) VALUES ('$name', '$email', '$profession', '$interest', '$image_src' ,'$password_1')";
 
 if($conn->query($sql)===TRUE ){
     echo ( "successful");
 } 
 else{  echo  ("failed");  }
 
 
}



 ?>
