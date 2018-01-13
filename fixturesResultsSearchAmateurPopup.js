$(document).ready(function()
{
 $("#fixturesResultsSearchAmateurLeaguesButton").click(function(){
  showAmateurOptionsPopupFixturesResults()
 });
});

function showAmateurOptionsPopupFixturesResults()
{
 $("#fixturesResultsAmateurOptions").fadeIn();
 $("#fixturesResultsAmateurOptions").css({"visibility":"visible","display":"block"});
}
