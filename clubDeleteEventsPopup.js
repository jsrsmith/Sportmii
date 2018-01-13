$(document).ready(function()
{
 $("#clubDeleteEventDiv").click(function(){
  clubShowDeletePopup();
  clubLoadDeleteEventsAjax()
 });
});

function clubShowDeletePopup()
{
 $("#clubDeleteEventsPopup").fadeIn();
 $("#clubDeleteEventsPopup").css({"visibility":"visible","display":"block"});
}

function clubLoadDeleteEventsAjax()
{
 $.ajax({
  url: "clubDeleteEvents.php",
  cache: false,
  success: function(html){
    $("#clubDeleteEventsPopup").empty();  
    $("#clubDeleteEventsPopup").append(html);
  }
});
}