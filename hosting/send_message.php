<?php


	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 


$name= mysqli_real_escape_string($conn, $_POST['name']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$subject= mysqli_real_escape_string($conn, $_POST['subject']);
$message= mysqli_real_escape_string($conn, $_POST['message']);
$location="working on it";
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR']; 
$session_id=$session["session_id"];

send_message();
   

  




function send_message(){
  global  $user_agent , $ip , $session_id  , $location, $name ,$email ,$subject , $message, $conn  ;
 
 $sql="INSERT INTO messages(user_agent , ip , session_id  ,location ,name  ,  email' , subject , message  ) VALUES ( '$user_agent', '$ip' , '$session_id' , '$location' , '$name' , '$email' , '$subject ',  '$message')";
 
 if($conn->query($sql)===TRUE ){
     echo "successful";

 } 
 else{  echo "failed";  }
 
 
}



 ?>
