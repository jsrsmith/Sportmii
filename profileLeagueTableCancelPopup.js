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

$(document).ready(function()
{
 $('.cancelNavigateToLeague').click(function(){
  removeChangeLeagueTablePopup();
 });

});

function removeChangeLeagueTablePopup()
{
 $(".changeDefaultLeagueInstructionPopup").fadeOut();
 $(".changeDefaultLeagueInstructionPopup").css({"visibility":"hidden","display":"none"});
}