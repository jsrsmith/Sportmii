$(document).ready(function()
{
 $(":button").click(function(){
  aboutMeRemovePopup();
 });

});

function aboutMeRemovePopup()
{
 $("#aboutMePopup").fadeOut();
 $("#aboutMePopup").css({"visibility":"hidden","display":"none"});
}