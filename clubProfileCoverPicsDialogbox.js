$(document).ready(function()
{
 $("#clubChangeProfilePic").click(function(){
  clubProfileShowPopup();
 });
 $('input[type="submit"]').click(function(){
  clubProfileHidePopup();
 });
});

function clubProfileShowPopup()
{
 $("#clubProfilepicpopup").fadeIn();
 $("#clubProfilepicpopup").css({"visibility":"visible","display":"block"});
}

function clubProfileHidePopup()
{
 $("#clubProfilepicpopup").fadeOut();
 $("#clubProfilepicpopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $("#clubChangeCoverPhoto").click(function(){
  clubCoverShowPopup();
 });
 $('input[type="submit"]').click(function(){
  clubCoverHidePopup();
 });
});

function clubCoverShowPopup()
{
 $("#clubCoverPhotoPopup").fadeIn();
 $("#clubCoverPhotoPopup").css({"visibility":"visible","display":"block"});
}

function clubCoverHidePopup()
{
 $("#clubCoverPhotoPopup").fadeOut();
 $("#clubCoverPhotoPopup").css({"visibility":"hidden","display":"none"});
}