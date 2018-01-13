$(document).ready(function()
{
 $('#cancelDeleteEvent').click(function(){
  removeDeletePopup();
 });

});

function removeDeletePopup()
{
 $("#deleteEventsPopup").fadeOut();
 $("#deleteEventsPopup").css({"visibility":"hidden","display":"none"});
}