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
			html+='<!--profile info start here--><div class="custom-block-info"> <div class="profile-block d-flex" style="padding:5px;">';
			html+='<img src=" '+a[i].profile_src+ ' " class="profile-block-image img-fluid" alt=""> ';
			html+=' <p> ' +a[i].profession+  ' <strong>' +a[i].name+  ' </strong></p>';
			html+=' </div></div><!--profile info ends here-->';
			
			html+='<!--posted info start here--> <p style="margin:"2px;">'+a[i].post+ '</p>';
			html+=' <img src="  ' + a[i].file_src + '  " class="about-image  img-fluid" alt=""> ';
			html+='<!--like comments info start here-->     <div class="custom-block-bottom d-flex justify-content-between mt-3">';
                   
			html+=' <a href="#" class="bi-headphones me-1"> <span>100k</span> </a><a href="#" class="bi-heart me-1"><span>2.5k</span></a>';
			html+=' <a href="#" class="bi-chat me-1"><span>924k</span></a></div><hr><!--like comments ends here-->'; 
		   
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
			 
			html+='  <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5" >';
            html+='  <div class="d-flex mb-3 mb-lg-0 mb-md-0">';
            html+='  <img src="  '  +a[i].image_src + '  " class="profile-block-image img-fluid" alt="">';
            html+=' <p>' +a[i].profession + '<img src="images/verified.png" class="verified-image img-fluid" alt="">';
            html+='  <strong>' +a[i].name + '</strong></p></div>';
            html+='  <ul class="social-icon ms-lg-auto ms-md-auto">';
		    html+='	<li class="social-icon-item"> <a href="#" class="social-icon-link bi-instagram"></a></li>';
            html+=' <li class="social-icon-item"> <a href="#" class="social-icon-link bi-twitter"></a></li>';
             html+=' <li class="social-icon-item"> <a href="#" class="social-icon-link bi-whatsapp"></a></li></ul></div>';
			   
			   
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
			html+='<div class="col-lg-8 col-12 mx-auto" style="padding:10px;margin:10px;"> ';
			html+='<div class="pb-5 mb-5"><img src=" ' +a[i].image_src+ ' " class="about-image mt-5 img-fluid" alt="">';
			html+='<div class="section-title-wrap mb-4" style="padding:10px;margin-top:10px;"> ';
html+='<h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;"> ' + a[i].name + ' </h6><BR>';
html+='<h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;" >' + a[i].profession + '</h6><BR>';
html+='<h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;" >' + a[i].country + '</h6><BR>';
html+='<h6 class="section-title" style="padding:10px;margin:5px;background-color:rgb(200,200,200);border-radius:10px;width:100%;">' + a[i].email + '</h6> </div>';
html+='<p>Pod Talk HTML CSS Template is made by Bootstrap v5.2.2 framework. You are allowed to modify and use this template for your business websites.</p>';
html+=' <p>You are not allowed to redistribute the downloadable template ZIP file on any other website without a permission. Please contact TemplateMo website for further information. Thank you.</p></div></div>';
			posts.html(html);
			
            }
			
			}
        });

 

}


function send_comment_box(){
	document.getElementById("send_comment_page").style.display="block";
	document.getElementById("posts_page").style.display="none";
}


function close_send_comment_box(){
	document.getElementById("send_comment_page").style.display="none";
	document.getElementById("posts_page").style.display="block";

}