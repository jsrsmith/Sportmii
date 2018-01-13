$(document).ready(function()
{
 $(":button").click(function(){
  positionsRemovePopup();
 });

});

function positionsRemovePopup()
{
 $("#positionsPopup").fadeOut();
 $("#positionsPopup").css({"visibility":"hidden","display":"none"});
}