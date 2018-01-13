$(document).ready(function()
{
 $('#viewTeamCancelRegister').click(function(){
  removeRegisterPopup();
 });

});

function removeRegisterPopup()
{
 $("#viewTeamRegisterPopup").fadeOut();
 $("#viewTeamRegisterPopup").css({"visibility":"hidden","display":"none"});
}