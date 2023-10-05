<?php


	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	} 



$user_name_POST['user_name
$product_name = $_POST['name'];
$price = $_POST['price'];
$session_id=$session["session_id"];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR']; 

add_to_cart();
   



function add_to_cart(){
  global $user_agent ,$ip ,$session_id,$price , $product_name  ,$user_name , $conn  ;
 
 $sql="INSERT INTO messages(user_name,product_name ,price ,session_id, user_agent, ip) VALUES ('$user_name, '$product_name', '$price', '$session_id', '$user_agent', '$ip' )";
 
 if($conn->query($sql)===TRUE ){
     echo "successful";

 } 
 else{  echo "failed";  }
 
 
}



 ?>
