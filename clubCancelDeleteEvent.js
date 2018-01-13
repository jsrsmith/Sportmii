$(document).ready(function()
{
 $('#clubCancelDeleteEvent').click(function(){
  clubRemoveDeletePopup();
 });

});

function clubRemoveDeletePopup()
{
 $("#clubDeleteEventsPopup").fadeOut();
 $("#clubDeleteEventsPopup").css({"visibility":"hidden","display":"none"});
}