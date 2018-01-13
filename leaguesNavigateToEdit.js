$(document).ready(function()
{
 $("#leaguesUserControlButton").click(function(){
  navigateToEditLeagues();
 });
});

function navigateToEditLeagues()
{
window.location.href = "leaguesCreateAddTeams.php";
}