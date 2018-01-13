$(document).ready(function()
{
 $('#teamCanceladdevent').click(function(){
  teamRemovepopup();
 });

});

function teamRemovepopup()
{
 $("#teamEventspopup").fadeOut();
 $("#teamEventspopup").css({"visibility":"hidden","display":"none"});
}