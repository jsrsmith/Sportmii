$(document).ready(function()
{
 $(".cancelTeamTopScorersButton").click(function(){
  teamTopScorersRemovePopup();
 });

});

function teamTopScorersRemovePopup()
{
 $("#teamTopScorersPopup").fadeOut();
 $("#teamTopScorersPopup").css({"visibility":"hidden","display":"none"});
}