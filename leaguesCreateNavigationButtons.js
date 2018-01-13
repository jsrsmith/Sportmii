$(document).ready(function()
{
 $("#leaguesReturnToLeaguesButton").click(function(){
  navigateBackToLeagues();
 });
});

function navigateBackToLeagues()
{
 window.location.href = "leagues.php";
}

$(document).ready(function()
{
 $("#leaguesNavigateToFixturesButton").click(function(){
  navigateToEditFixtures();
 });
});

function navigateToEditFixtures()
{
 window.location.href = "fixturesResultsEdit.php";
}