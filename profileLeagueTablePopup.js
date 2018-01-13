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


$(document).ready(function()
{
 $(".changeDefaultLeagueInstruction").click(function(){
  showChangeLeaguePopup();
 });
});

function showChangeLeaguePopup()
{
 $(".changeDefaultLeagueInstructionPopup").fadeIn();
 $(".changeDefaultLeagueInstructionPopup").css({"visibility":"visible","display":"block"});
}