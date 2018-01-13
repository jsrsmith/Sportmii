$(document).ready(function()
{
 $("#wholething").click(function(){
  positionsShowPopup();
 });
 $('input[type="submit"]').click(function(){
  positionsHidePopup();
 });
});

function positionsShowPopup()
{
 $("#positionsPopup").fadeIn();
 $("#positionsPopup").css({"visibility":"visible","display":"block"});
}

function positionsHidePopup()
{
 $("#positionsPopup").fadeOut();
 $("#positionsPopup").css({"visibility":"hidden","display":"none"});
}