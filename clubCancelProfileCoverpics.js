$(document).ready(function()
{
 $(":button").click(function(){
  clubProfileRemovePopup();
 });

});

function clubProfileRemovePopup()
{
 $("#clubProfilepicpopup").fadeOut();
 $("#clubProfilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $(":button").click(function(){
  clubCoverRemovePopup();
 });

});

function clubCoverRemovePopup()
{
 $("#clubCoverPhotoPopup").fadeOut();
 $("#clubCoverPhotoPopup").css({"visibility":"hidden","display":"none"});
}