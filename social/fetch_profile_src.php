<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn= mysqli_connect($servername, $username, $password, $dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}
	
$user_email2="fungaifakazi@gmail.com";

	
				
  fetch_profile_src() ;  	

function fetch_profile_src(){

    global $conn ,$user_email2;
    
$sql= " SELECT image_src FROM users WHERE email='$user_email2' ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global    $image_src ;
    $image_src= $row['image_src'];
  
    echo ($image_src);

}
}

else { echo "query failed";}






}


  


?>