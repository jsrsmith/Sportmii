$(document).ready(function()
{
 $(":button").click(function(){
  teamProfileRemovePopup();
 });

});

function teamProfileRemovePopup()
{
 $("#teamProfilepicpopup").fadeOut();
 $("#teamProfilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $(":button").click(function(){
  teamCoverRemovePopup();
 });

});

function teamCoverRemovePopup()
{
 $("#teamCoverPhotoPopup").fadeOut();
 $("#teamCoverPhotoPopup").css({"visibility":"hidden","display":"none"});
}