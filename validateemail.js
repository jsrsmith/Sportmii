/*$(document).ready(function() {
$("#email").blur(function() 
{
 var emailReg = /\S+@\S+\.\S+/;  
 var emailaddress = $("#email").val();
   if(!emailReg.test(emailaddress)) 
   $("#emaildiv").html('<font color="red">Sorry! This email address is not valid.</font>');    
   else
            $("#emaildiv").html('<font color="#red"></font>');    
});
});*/

$(document).ready(function() {
$("#email").keyup(function() 
{
 var emailReg = /\S+@\S+\.\S+/;  
 var emailaddress = $("#email").val();
   if(!emailReg.test(emailaddress)) 
   $("#email").css('border', ' 1px solid red');   
   else
            $("#email").css('border', ' 1px solid green');     
});
});

$(document).ready(function() {
$("#email").blur(function() 
{
 var emailReg = /\S+@\S+\.\S+/;  
 var emailaddress = $("#email").val();
   if(!emailReg.test(emailaddress)) 
   $("#email").css('border', ' 1px solid red');   
   else
            $("#email").css('border', ' 1px solid green');     
});
});