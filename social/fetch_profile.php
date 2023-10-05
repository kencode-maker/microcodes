<?php

	$servername='localhost';
$username='root'; 	$password=''; 	$dbname = 'microcodes'; 

$conn=mysqli_connect($servername,$username,$password,$dbname); 
	
 if(!$conn){
     echo "failed to connect";
     	}


  //$file_type=$_POST['file_type'];
  $file_type="profile";
  //$user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
  $user_email = "fungaifakazi@gmail.com";


  function check_file_type(){
	
    global $file_type;

  if($file_type=="profile"){ fetch_profile(); }

  else{  echo " file_type variable not assigned "; }

}	
		
		
  fetch_profile() ;  	

function fetch_profile(){
    global $conn , $user_email;
    
$sql=" SELECT * FROM users WHERE email='$user_email' ";

$result=mysqli_query($conn,$sql);

if($result){
while($row = mysqli_fetch_assoc($result)){
	global   $name ,$email ,$profession ,$interest , $image_src ,$date , $id , $data;
	
    $name= $row['name'];
	$email= $row['email'];
	$profession = $row['profession'];
	$country = $row['interest'];
     $image_src= $row['image_src'];
	 $date= $row['date'];
    $id=$row['id'];
  $data[]= $row ;


}
}

else { echo "query failed"; }


    echo   json_encode($data);



}


   
//echo '<div id="full_profile_wrapper" ><img src=" '.$image_src.' "   id="full_profile_image"  /><p id="full_profile_details" class="user_name"><b>'.$name.' </b></p><p id="full_profile_details"><b>'.$email.' </b></p></div><input type="text"  class="profile_src" placeholder="'.$image_src.'"   name="profile_src" />';




?>