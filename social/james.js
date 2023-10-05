function send_message(){
  var message= $("#textbox3").val();

     $.ajax({
         type:"POST" ,
         url:"send_message.php" ,
        data: {message: message},    

success: function (data){
    
   
 $("#item_header").html(data);

} 

});

   }   
   
    function fetch_data(){
     
var file_type="fetch_messages";

     $.ajax({
         type:"POST" ,
         url:"fetch_data.php" ,
         data:{file_type : file_type},


success: function (data){
   
  $("#messages").html(data);

} });
   


}
