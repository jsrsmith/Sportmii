$(document).ready(function()
{
 $(".allTeamsInfo").click(function(){
  showTeamListPopup();
 });
});

function showTeamListPopup()
{
 $("#clubTeamListPopup").fadeIn();
 $("#clubTeamListPopup").css({"visibility":"visible","display":"block"});
}