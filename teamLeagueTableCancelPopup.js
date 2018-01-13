$(document).ready(function()
{
 $('.cancelDefaultLeague').click(function(){
  removeDefaultLeaguePopup();
 });

});

function removeDefaultLeaguePopup()
{
 $(".defaultLeagueForLeagueTablePopup").fadeOut();
 $(".defaultLeagueForLeagueTablePopup").css({"visibility":"hidden","display":"none"});
}