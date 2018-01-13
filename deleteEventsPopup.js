$(document).ready(function()
{
 $("#deleteEventDiv").click(function(){
  showDeletePopup();
  loadDeleteEventsAjax()
 });
});

function showDeletePopup()
{
 $("#deleteEventsPopup").fadeIn();
 $("#deleteEventsPopup").css({"visibility":"visible","display":"block"});
}

function loadDeleteEventsAjax()
{
 $.ajax({
  url: "deleteEvents.php",
  cache: false,
  success: function(html){
    $("#deleteEventsPopup").empty();  
    $("#deleteEventsPopup").append(html);
  }
});
}
