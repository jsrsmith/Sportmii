$(document).ready(function()
{
 $(".profileCancelScouting").click(function(){
  profileScoutingRemovePopup();  
 });
    
$(".profileCancelScouted").click(function(){
  profileScoutedRemovePopup();  
 });

});

function profileScoutingRemovePopup()
{
 $(".profileScoutingPopup").fadeOut();
 $(".profileScoutingPopup").css({"visibility":"hidden","display":"none"});
}

function profileScoutedRemovePopup()
{
 $(".profileScoutedPopup").fadeOut();
 $(".profileScoutedPopup").css({"visibility":"hidden","display":"none"});
}