$(document).ready(function()
{
 $("#changeProfilePic").click(function(){
  profileShowPopup();
 });
 $('input[type="submit"]').click(function(){
  profileHidePopup();
 });
});

function profileShowPopup()
{
 $("#profilepicpopup").fadeIn();
 $("#profilepicpopup").css({"visibility":"visible","display":"block"});
}

function profileHidePopup()
{
 $("#profilepicpopup").fadeOut();
 $("#profilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $("#changeCoverPhoto").click(function(){
  coverShowPopup();
 });
 $('input[type="submit"]').click(function(){
  coverHidePopup();
 });
});

function coverShowPopup()
{
 $("#coverPhotoPopup").fadeIn();
 $("#coverPhotoPopup").css({"visibility":"visible","display":"block"});
}

function coverHidePopup()
{
 $("#coverPhotoPopup").fadeOut();
 $("#coverPhotoPopup").css({"visibility":"hidden","display":"none"});
}