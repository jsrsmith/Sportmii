$(document).ready(function()
{
 $('.cancelDefaultTeam').click(function(){
  removeDefaultTeamPopup();
 });

});

function removeDefaultTeamPopup()
{
 $(".defaultTeamForLeagueTablePopup").fadeOut();
 $(".defaultTeamForLeagueTablePopup").css({"visibility":"hidden","display":"none"});
}