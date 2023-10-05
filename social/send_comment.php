<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn= mysqli_connect($servername, $username, $password, $dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}

	
$name=$_POST['c_name'];
$profile_src=$_POST['profile_src'];
$post_id2=$_POST['post_id'];
$comment=$_POST['comment'];	
				
  insert_comments() ;  	

function insert_comments(){

    global $conn ,$name ,$profile_src, $comment ,$post_id2;
    
$sql="INSERT INTO comments( name ,profile_src  ,comment ,post_id  ) VALUES ('$name' , '$profile_src' , '$comment', '$post_id2' )";
 
 if($conn->query($sql)===TRUE ){
     echo ( "successful");
 }
 
 else{  echo  ("failed");  }

  
}

?>