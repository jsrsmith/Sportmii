$(document).ready(function()
{
 $(".allTeamTopScorers").click(function(){
  teamTopScorersShowPopup();
 });
});

function teamTopScorersShowPopup()
{
 $("#teamTopScorersPopup").fadeIn();
 $("#teamTopScorersPopup").css({"visibility":"visible","display":"block"});
}
