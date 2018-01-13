$(document).ready(function()
{
 $("#viewTeamRegisterPlayerButton").click(function(){
  showRegisterPopup()
 });
});

function showRegisterPopup()
{
 $("#viewTeamRegisterPopup").fadeIn();
 $("#viewTeamRegisterPopup").css({"visibility":"visible","display":"block"});
}
