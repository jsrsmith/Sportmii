$(document).ready(function()
{
 $("#teamDeleteEventDiv").click(function(){
  teamShowDeletePopup();
  teamLoadDeleteEventsAjax()
 });
});

function teamShowDeletePopup()
{
 $("#teamDeleteEventsPopup").fadeIn();
 $("#teamDeleteEventsPopup").css({"visibility":"visible","display":"block"});
}

function teamLoadDeleteEventsAjax()
{
 $.ajax({
  url: "teamDeleteEvents.php",
  cache: false,
  success: function(html){
    $("#teamDeleteEventsPopup").empty();  
    $("#teamDeleteEventsPopup").append(html);
  }
});
}