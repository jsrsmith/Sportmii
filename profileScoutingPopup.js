$(document).ready(function()
{
 $(".profileScoutingBoth").click(function(){
  profileScoutingShowPopup();
 });
    
$(".profileScoutedBoth").click(function(){
  profileScoutedShowPopup();
 });
});

function profileScoutingShowPopup()
{
 $(".profileScoutingPopup").fadeIn();
 $(".profileScoutingPopup").css({"visibility":"visible","display":"block"});
}

function profileScoutedShowPopup()
{
 $(".profileScoutedPopup").fadeIn();
 $(".profileScoutedPopup").css({"visibility":"visible","display":"block"});
}