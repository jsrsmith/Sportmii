$(document).ready(function()
{
 $(".TeamDefaultLeague").click(function(){
  showDefaultLeaguePopup();
 });
});

function showDefaultLeaguePopup()
{
 $(".defaultLeagueForLeagueTablePopup").fadeIn();
 $(".defaultLeagueForLeagueTablePopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $(".TeamDefaultLeagueChange").click(function(){
  showDefaultLeagueChangePopup();
 });
});

function showDefaultLeagueChangePopup()
{
 $(".defaultLeagueForLeagueTablePopup").fadeIn();
 $(".defaultLeagueForLeagueTablePopup").css({"visibility":"visible","display":"block"});
}