$(document).ready(function()
{
 $("#allTeamDetails").click(function(){
  teamDetailsShowPopup();
 });
});

function teamDetailsShowPopup()
{
 $("#teamDetailsPopup").fadeIn();
 $("#teamDetailsPopup").css({"visibility":"visible","display":"block"});
}
