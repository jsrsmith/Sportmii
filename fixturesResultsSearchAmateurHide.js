$(document).ready(function()
{
 $("#fixturesResultsHideAmateurLeagueSearch").click(function(){
  hideFixturesResultsSearch();
 });

});

function hideFixturesResultsSearch()
{
 $("#fixturesResultsAmateurOptions").fadeOut();
 $("#fixturesResultsAmateurOptions").css({"visibility":"hidden","display":"none"});
}