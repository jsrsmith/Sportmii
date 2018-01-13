$(document).ready(function()
{
 $("#teamControlButton").click(function(){
  showControlPopup()
 });
});

function showControlPopup()
{
 $("#teamControlPopup").fadeIn();
 $("#teamControlPopup").css({"visibility":"visible","display":"block"});
}
