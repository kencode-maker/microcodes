<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn= mysqli_connect($servername, $username, $password, $dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}
	

$user_email2=$_POST['user_email2'];
	
				
  fetch_name() ;  	

function fetch_name(){

    global $conn ,$user_email2;
    
$sql= " SELECT * FROM users WHERE email='$user_email2' ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global   $name , $image_src , $id , $data;
    $name= $row['name'];
  
    echo ($name);

}
}

else { echo "query failed";}






}


  


?>