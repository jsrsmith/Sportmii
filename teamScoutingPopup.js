$(document).ready(function()
{
 $(".profileScoutingBoth").click(function(){
  viewProfileScoutingShowPopup();
 });
    
$(".profileScoutedBoth").click(function(){
  viewProfileScoutedShowPopup();
 });
});

function viewProfileScoutingShowPopup()
{
 $(".profileScoutingPopup").fadeIn();
 $(".profileScoutingPopup").css({"visibility":"visible","display":"block"});
}

function viewProfileScoutedShowPopup()
{
 $(".profileScoutedPopup").fadeIn();
 $(".profileScoutedPopup").css({"visibility":"visible","display":"block"});
}