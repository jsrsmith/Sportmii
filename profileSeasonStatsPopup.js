$(document).ready(function()
{
 $(".seasonStatsTable").click(function(){
  showProfileSeasonStatsPopup();
 });
});

function showProfileSeasonStatsPopup()
{
 $("#profileSeasonStatsPopup").fadeIn();
 $("#profileSeasonStatsPopup").css({"visibility":"visible","display":"block"});
}