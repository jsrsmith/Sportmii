$(document).ready(function()
{
 $("#searchAmateurLeaguesButton").click(function(){
  showAmateurOptionsPopup()
 });
});

function showAmateurOptionsPopup()
{
 $("#leagueAmateurOptions").fadeIn();
 $("#leagueAmateurOptions").css({"visibility":"visible","display":"block"});
}
