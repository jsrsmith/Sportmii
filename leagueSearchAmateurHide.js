$(document).ready(function()
{
 $("#hideAmateurLeagueSearch").click(function(){
  hideLeagueSearch();
 });

});

function hideLeagueSearch()
{
 $("#leagueAmateurOptions").fadeOut();
 $("#leagueAmateurOptions").css({"visibility":"hidden","display":"none"});
}