$(document).ready(function()
{
 $(".profileDefaultLeagueTeam").click(function(){
  showDefaultTeamPopup();
 });
});

function showDefaultTeamPopup()
{
 $(".defaultTeamForLeagueTablePopup").fadeIn();
 $(".defaultTeamForLeagueTablePopup").css({"visibility":"visible","display":"block"});
}