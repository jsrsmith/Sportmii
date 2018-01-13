$(document).ready(function()
{
 $('#teamCancelControl').click(function(){
  removeControlPopup();
 });

});

function removeControlPopup()
{
 $("#teamControlPopup").fadeOut();
 $("#teamControlPopup").css({"visibility":"hidden","display":"none"});
}