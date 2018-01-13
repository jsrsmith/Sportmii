$(document).ready(function()
{
 $('.cancel').click(function(){
  removeProfileSeasonStatsPopup();
 });

});

function removeProfileSeasonStatsPopup()
{
 $("#profileSeasonStatsPopup").fadeOut();
 $("#profileSeasonStatsPopup").css({"visibility":"hidden","display":"none"});
}