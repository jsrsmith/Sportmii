$(document).ready(function()
{
 $("#fixturesResultsEditReturnToFixturesButton").click(function(){
  navigateBackToFixtures();
 });
});

function navigateBackToFixtures()
{
 window.location.href = "fixturesResults.php";
}

$(document).ready(function()
{
 $("#fixturesResultsEditNavigateToLeaguesButton").click(function(){
  navigateToEditLeagues();
 });
});

function navigateToEditLeagues()
{
 window.location.href = "leaguesCreateAddTeams.php";
}