$(document).ready(function()
{
 $("#teamChangeProfilePic").click(function(){
  teamProfileShowPopup();
 });
 $('input[type="submit"]').click(function(){
  teamProfileHidePopup();
 });
});

function teamProfileShowPopup()
{
 $("#teamProfilepicpopup").fadeIn();
 $("#teamProfilepicpopup").css({"visibility":"visible","display":"block"});
}

function teamProfileHidePopup()
{
 $("#teamProfilepicpopup").fadeOut();
 $("#teamProfilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $("#teamChangeCoverPhoto").click(function(){
  teamCoverShowPopup();
 });
 $('input[type="submit"]').click(function(){
  teamCoverHidePopup();
 });
});

function teamCoverShowPopup()
{
 $("#teamCoverPhotoPopup").fadeIn();
 $("#teamCoverPhotoPopup").css({"visibility":"visible","display":"block"});
}

function teamCoverHidePopup()
{
 $("#teamCoverPhotoPopup").fadeOut();
 $("#teamCoverPhotoPopup").css({"visibility":"hidden","display":"none"});
}