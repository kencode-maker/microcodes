<?php

	$servername='localhost'; $username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn= mysqli_connect($servername, $username, $password, $dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}

$user_name= mysqli_real_escape_string($conn, $_POST['user_name']);
$password= mysqli_real_escape_string($conn, $_POST['password']);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$session_id ="12";
				
  login() ;  	

function login(){

    global  $user_name  , $password,  $user_agent , $ip ,$session_id  ;
    
   
$sql= " SELECT * FROM users WHERE user_name='$user_name'  &&  password='$password'  ";

$result=mysqli_query($conn,$sql);

if($result){


  
}

?>