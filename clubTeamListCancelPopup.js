$(document).ready(function()
{
 $('#cancelClubTeamList').click(function(){
  removeTeamListPopup();
 });

});

function removeTeamListPopup()
{
 $("#clubTeamListPopup").fadeOut();
 $("#clubTeamListPopup").css({"visibility":"hidden","display":"none"});
}