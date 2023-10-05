<?php


	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 



$full_name= mysqli_real_escape_string($conn, $_POST['full_name']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$phone_number= mysqli_real_escape_string($conn, $_POST['phone_number']);
$country= mysqli_real_escape_string($conn, $_POST['country']);
$city= mysqli_real_escape_string($conn, $_POST['city']);
$address= mysqli_real_escape_string($conn, $_POST['address']);
$user_name= mysqli_real_escape_string($conn, $_POST['user_name']);
$gender= mysqli_real_escape_string($conn, $_POST['gender']);
$password= mysqli_real_escape_string($conn, $_POST['password']);
$session_id=$session["session_id"];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR']; 


add_to_cart();
   

function add_to_cart(){
  global $session_id, $user_agent ,$ip ,$full_name, $email , $phone_number,  $country ,   $city ,  $address  ,$user_name,  $gender  ,$password , $conn  ;
 
 $sql="INSERT INTO messages(user_name,product_name ,price ,session_id, user_agent, ip) VALUES ('$full_name', '$email', '$phone_number', '$country', '$city', '$address', '$user_name', '$gender', '$password', '$session', '$user_agent', '$ip'   )";
 
 if($conn->query($sql)===TRUE ){
     echo "successful";

 } 
 else{  echo "failed";  }
 
 
}



 ?>
