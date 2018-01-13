$(document).ready(function()
{
 $("#teamRegisterPlayerButton").click(function(){
  showRegisterPopup()
 });
});

function showRegisterPopup()
{
 $("#teamRegisterPopup").fadeIn();
 $("#teamRegisterPopup").css({"visibility":"visible","display":"block"});
}
