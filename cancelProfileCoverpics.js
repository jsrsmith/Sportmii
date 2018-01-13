$(document).ready(function()
{
 $(":button").click(function(){
  profileRemovePopup();
 });

});

function profileRemovePopup()
{
 $("#profilepicpopup").fadeOut();
 $("#profilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $(":button").click(function(){
  coverRemovePopup();
 });

});

function coverRemovePopup()
{
 $("#coverPhotoPopup").fadeOut();
 $("#coverPhotoPopup").css({"visibility":"hidden","display":"none"});
}