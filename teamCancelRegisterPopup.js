$(document).ready(function()
{
 $('#teamCancelRegister').click(function(){
  removeRegisterPopup();
 });

});

function removeRegisterPopup()
{
 $("#teamRegisterPopup").fadeOut();
 $("#teamRegisterPopup").css({"visibility":"hidden","display":"none"});
}