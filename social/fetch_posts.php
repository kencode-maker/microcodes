<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}
	

//$file_type=$_POST['file_type'];
$file_type="images";
check_file_type();

function check_file_type(){
	
    global $file_type;

if($file_type=="images"){ fetch_image_posts(); }

else{  echo " file_type variable not assigned "; }

}	
	$data = array();	
		
  fetch_image_posts() ;  	

function fetch_image_posts(){
    global $conn;
    
$sql="SELECT * FROM posts  ORDER BY  id DESC ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global   $name ,$profile_src ,$time ,$post ,  $comments , $likes , $image_src ,$file_src  , $id , $data;
    $name= $row['name'];
    $profile_src=$row['profile_src'];
    $time=$row['time'];
     $post=$row['post'];
    $comments=$row['comments'];
    $likes=$row['likes'];
     $file_src=$row['file_src'];
    
    $post_id=$row['post_id'];
  
  $data[] = $row ;



}
}

else { echo "query failed";}






}
 echo json_encode($data);

   


//echo json_encode($data);


?>