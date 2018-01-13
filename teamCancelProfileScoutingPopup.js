$(document).ready(function()
{
 $(".profileCancelScouting").click(function(){
  viewProfileScoutingRemovePopup();  
 });
    
$(".profileCancelScouted").click(function(){
  viewProfileScoutedRemovePopup();  
 });

});

function viewProfileScoutingRemovePopup()
{
 $(".profileScoutingPopup").fadeOut();
 $(".profileScoutingPopup").css({"visibility":"hidden","display":"none"});
}

function viewProfileScoutedRemovePopup()
{
 $(".profileScoutedPopup").fadeOut();
 $(".profileScoutedPopup").css({"visibility":"hidden","display":"none"});
}