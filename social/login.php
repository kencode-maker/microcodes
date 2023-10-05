<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 


$email= mysqli_real_escape_string($conn,$_POST['email_1']);
$password_1= mysqli_real_escape_string($conn,$_POST['password_3']);

 
 
 login();


function login(){
    global $conn ,$email ,$password_1;
    
$sql= "SELECT * FROM users where email='$email' and password='$password_1' ";

$result=mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($count == 1){
	echo "successful";
	
}

else{
		echo "failed";
	}
}

 ?>
