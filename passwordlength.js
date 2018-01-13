$(document).ready(function() {
$("#password").keyup(function() 
{ 
 var pass = $("#password").val();
   if(pass.length < 6) 
   $("#password").css('border', ' 1px solid red');   
   else
            $("#password").css('border', ' 1px solid green');     
});
});

$(document).ready(function() {
$("#password").blur(function() 
{ 
 var pass = $("#password").val();
   if(pass.length < 6) 
   $("#password").css('border', ' 1px solid red');   
   else
            $("#password").css('border', ' 1px solid green');     
});
});