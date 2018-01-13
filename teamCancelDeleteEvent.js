$(document).ready(function()
{
 $('#teamCancelDeleteEvent').click(function(){
  teamRemoveDeletePopup();
 });

});

function teamRemoveDeletePopup()
{
 $("#teamDeleteEventsPopup").fadeOut();
 $("#teamDeleteEventsPopup").css({"visibility":"hidden","display":"none"});
}