<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn= mysqli_connect($servername, $username, $password, $dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}
	

$post_id2=$_POST['post_d'];

		

		$data = array();	
		
  fetch_comments() ;  	

function fetch_comments(){

    global $conn ,$post_id2;
    
$sql= " SELECT * FROM comments WHERE post_id='$post_id2' ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global   $name ,$profile_src , $comment , $comment_id ,  $post_id , $time;
    $name= $row['name'];
  $profile_src= $row['profile_src'];
 $comment= $row['comment'];
 $comment_id= $row['comment_id']; 
  $post_id= $row['post_id'];
 $time= $row['time']; 
  $data[]=$row;
  
  echo json_encode($data);
  

}


}

else { echo "query failed";}

}


  


?>