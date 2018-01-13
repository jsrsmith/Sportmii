$(document).ready(function()
{
 $("#aboutMeIntro").click(function(){
  aboutMeShowPopup();
 });
 $('input[type="submit"]').click(function(){
  aboutMeHidePopup();
 });
});

function aboutMeShowPopup()
{
 $("#aboutMePopup").fadeIn();
 $("#aboutMePopup").css({"visibility":"visible","display":"block"});
}

function aboutMeHidePopup()
{
 $("#aboutMePopup").fadeOut();
 $("#aboutMePopup").css({"visibility":"hidden","display":"none"});
}