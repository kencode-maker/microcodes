 <?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = "microcodes"; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}
	
	
	
	

	
	

//$file_type=$_POST['file_type'];
$file_type="users";
check_file_type();

function check_file_type(){
	
    global $file_type;

if($file_type=="users"){ fetch_users(); }

else{  echo " file_type variable not assigned "; }

}	
		
	

	$data = array();		
  fetch_users() ;  	

function fetch_users(){
    global $conn;
    
$sql=" SELECT * FROM users ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global   $name , $image_src , $profession , $id , $data;
    $name= $row['name'];
     $image_src=$row['image_src'];
	  $profession=$row['profession'];
    $id=$row['id'];
  $data[]= $row ;
 

}



}

else { echo "query failed";}






}


   
echo json_encode($data);


?>