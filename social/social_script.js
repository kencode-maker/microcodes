function login_page(){ 
document.getElementById("login_page").style.display="block";
document.getElementById("login_form").style.display="block";
document.getElementById("sign_up_form").style.display="none";
document.getElementById("post").style.display="none";
document.getElementById("home_page").style.display="none";
document.getElementById("profile").style.display="none";
document.getElementById("menu").style.display="none";
document.getElementById("users").style.display="none";
document.getElementById("login_text").innerHTML="Login";

}

function sign_up(){ 

document.getElementById("sign_up_form").style.display="block";
document.getElementById("login_form").style.display="none";
document.getElementById("login_text").innerHTML="Sign up";


}

function login(){ 
document.getElementById("login_form").style.display="block";
document.getElementById("sign_up_form").style.display="none";
document.getElementById("login_text").innerHTML="Login";
}

function loadingb(){ 
document.getElementById("loading_box").style.display="block";

}



function home_page(){
document.getElementById("home_page").style.display="block";
document.getElementById("menu").style.display="block";
document.getElementById("posts_wrapper").style.display="block";
document.getElementById("profile").style.display="none";
document.getElementById("post").style.display="none";
document.getElementById("users").style.display="none";
document.getElementById("login_page").style.display="none";

}


function make_post(){ 
document.getElementById("post").style.display="block";
document.getElementById("home_page").style.display="none";
document.getElementById("profile").style.display="none";
document.getElementById("comments").style.display="none";
document.getElementById("users").style.display="none";
}


function profile(){ 
document.getElementById("profile").style.display="block";
document.getElementById("home_page").style.display="none";
document.getElementById("post").style.display="none";
document.getElementById("comments").style.display="none";
document.getElementById("users").style.display="none";
}

function view_comments(){ document.getElementById("comments").style.display="block";
document.getElementById("posts_wrapper").style.display="none";


}
function close_comments(){ document.getElementById("comments").style.display="none";
document.getElementById("posts_wrapper").style.display="block";


}



function users(){
    document.getElementById("users").style.display="block";
     
document.getElementById("home_page").style.display="none";

document.getElementById("post").style.display="none";

document.getElementById("profile").style.display="none";

document.getElementById("comments").style.display="none";
}


