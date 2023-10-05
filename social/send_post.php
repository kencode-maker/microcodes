<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 
		

$name= mysqli_real_escape_string($conn, $_POST['user_name']);
$profile_src= mysqli_real_escape_string($conn, $_POST['profile_src']);
 $story= mysqli_real_escape_string($conn, $_POST['story']);


 $filename= $_FILES['image']['name'];

 $filename_2=$_FILES['image']['tmp_name'];

 $filesize=$_FILES['image']['size'];

 $image_folder="images/";



$file_src= $image_folder.$filename;
 

 $image_extension=strtolower(pathinfo($file_src,PATHINFO_EXTENSION ) );


 $image_arr=array("jpg","png","jpeg","gif");

check_file_type();


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
        insert_file();
    }
    
    else{echo"file not supported";}
}



function insert_file(){
    global $file_src , $filename_2;
    
 if(move_uploaded_file($filename_2, $file_src)){ insert_post_data(); }
  else { echo ("failed to upload image"); }

}  

  


function insert_post_data(){
 global $conn ,$name ,$story ,$file_src ,$profile_src ;
 
 $sql="INSERT INTO posts( name ,profile_src  ,post ,file_src  ) VALUES ('$name' , '$profile_src' , '$story', '$file_src' )";
 
 if($conn->query($sql)===TRUE ){
     echo ( "successful");
 }
 
 else{  echo ("failed");  }
 

}



 ?>
