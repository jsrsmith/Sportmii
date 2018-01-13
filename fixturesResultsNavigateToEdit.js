$(document).ready(function()
{
 $("#fixturesResultsUserControlButton").click(function(){
  navigateToEditFixturesResults();
 });
});

function navigateToEditFixturesResults()
{
window.location.href = "fixturesResultsEdit.php";
}