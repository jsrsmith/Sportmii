$(document).ready(function()
{
 $("#clubControlButton").click(function(){
  showclubControlPopup()
 });
});

function showclubControlPopup()
{
 $("#clubControlPopup").fadeIn();
 $("#clubControlPopup").css({"visibility":"visible","display":"block"});
}
