$(document).ready(function()
{
 $(":button").click(function(){
  teamDetailsRemovePopup();
 });

});

function teamDetailsRemovePopup()
{
 $("#teamDetailsPopup").fadeOut();
 $("#teamDetailsPopup").css({"visibility":"hidden","display":"none"});
}