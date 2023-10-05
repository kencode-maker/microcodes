var post_user_email;
var post_user_name;
var post_profile_src;



function send_post()
 { 
 
 event.preventDefault();
 
 
 var user_name=post_user_name;
  var profile_src=post_profile_src;
  var story= $("#story").val();
  var fil= $("#post_file")[0];
 var file2 = fil.files[0];

  var fom3 = new FormData();
  
 fom3.append("user_name", user_name);
 fom3.append("profile_src", profile_src);
 fom3.append("story", story);
   fom3.append("image", file2);

	
 
//var form = $("#sign_up_form").serialize();
 
$.ajax({
        type: "POST" ,
		enctype: 'multipart/form-data',
        url: "send_post.php" ,
        data: fom3,
        
		contentType: false,
		processData: false,
		
		beforeSend: function(){  alert("sending ");
		
		},
		
        success:function(data){
		
            alert(data); 
			
        }
				      
     });
	 
	 
 }



fetch_posts();
function fetch_posts(){


        $.ajax({ type: "POST" ,
            url: 'fetch_posts.php',
            dataType: 'html',
		//datatype id html hence JSON.parse(data);	
          success: function(data) {
			var a= JSON.parse(data);
      
		   var html="";
		   var posts=$("#posts_wrapper");
		  
	for(var i=0; i< a.length; i++){
			html+='<div class="col-lg-4 col-12 mb-4 mb-lg-0" style="margin-top:5px;" id="post_container"><div class="custom-block custom-block-full">';
			html+='<div class="custom-block-info"><h5 class="mb-2"><a href="detail-page.html">Vintage Show </a> </h5>';
			html+='<div class="profile-block d-flex"> <img src=" '+a[i].profile_src+ '  " class="profile-block-image img-fluid" alt="">';
			html+='<p> ' +a[i].name+  ' <strong>Influencer</strong></p></div> <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>';
			html+='<div class="custom-block-bottom d-flex justify-content-between mt-3">';
			html+='<a href="#" class="bi-headphones me-1"><span>100k</span></a><a href="#" class="bi-heart me-1">';
			html+='<span>2.5k</span></a><a href="#" class="bi-chat me-1"> <span>924k</span></a></div></div>';
			html+='<div class="social-share d-flex flex-column ms-auto"> <a href="#" class="badge ms-auto"><i class="bi-heart"></i>';
			html+='</a><a href="#" class="badge ms-auto"><i class="bi-bookmark"></i></a></div>'; 
			html+='<div class="custom-block-image-wrap"><a href="detail-page.html">';
			html+='<img src="' + a[i].file_src + ' " class="custom-block-image img-fluid" alt=""  /></a></div>      </div></div> ';	   
			   }
			posts.html(html);
			
            }
			
			
        });

 

}

fetch_users();

function fetch_users(){

            $.ajax({ type: "POST" ,
            url: 'fetch_users.php',
            dataType: 'json',
			
          success: function(data) {
			var a= data;
          
		   var html="";
		   var posts=$("#user_data");
		  
	for(var i=0; i< a.length; i++){
			html+=' <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0" ><div class="team-thumb "  style="height:400px;width:250px;margin-top:20px;margin-right:auto; margin-left:auto;padding:10px;background-color:blue;"  ><img src=" ' +a[i].image_src + ' " class="about-image img-fluid"  style="height:400px;width:100%;object-fit:cover;" /><div class="team-info" > <h4 class="mb-2"> ' +a[i].name + ' <img src="images/verified.png" class="verified-image img-fluid" alt=""></h4><span class="badge">follow</span> <span class="badge">chart</span></div><div class="social-share"><ul class="social-icon"><li class="social-icon-item"> <a href="#" class="social-icon-link bi-twitter"></a></li> <li class="social-icon-item"> <a href="#" class="social-icon-link bi-facebook"></a></li><li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li></ul></div></div></div>'; 
			posts.html(html);
			
            }
			
			}
        });
		
		


}

fetch_profile();
function fetch_profile(){

         $.ajax({ type: "POST" ,
            url: 'fetch_profile.php',
            dataType: 'json',
			
          success: function(data) {
			var a= data;
			post_user_email=data[0].email;
			post_user_name=data[0].name;
			post_profile_src=data[0].image_src;
				
				
          
		   
		   var html="";
		   var posts=$("#profile_data");
		  
	for(var i=0; i< a.length; i++){
			html+='<div class="col-lg-8 col-12 mx-auto" style="padding:10px;margin:10px;"> <div class="pb-5 mb-5"><img src=" ' +a[i].image_src+ ' " class="about-image mt-5 img-fluid" alt=""><div class="section-title-wrap mb-4" style="padding:10px;margin-top:10px;"> <h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;"> ' + a[i].name + ' </h6><BR><h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;" >' + a[i].profession + '</h6><BR><h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;" >' + a[i].country + '</h6><BR><h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;">' + a[i].email + '</h6> </div><p>Pod Talk HTML CSS Template is made by Bootstrap v5.2.2 framework. You are allowed to modify and use this template for your business websites.</p> <p>You are not allowed to redistribute the downloadable template ZIP file on any other website without a permission. Please contact TemplateMo website for further information. Thank you.</p></div></div>';
			posts.html(html);
			
            }
			
			}
        });

 

}