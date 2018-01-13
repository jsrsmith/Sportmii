$(document).ready(function()
{
 $("#editeventdiv").click(function(){
  showeditpopup();
  loadediteventsajax()
 });
});

function showeditpopup()
{
 $("#editeventspopup").fadeIn();
 $("#editeventspopup").css({"visibility":"visible","display":"block"});
}

function loadediteventsajax()
{
 $.ajax({
  url: "editevents.php",
  cache: false,
  success: function(html){
    $("#editeventspopup").empty();  
    $("#editeventspopup").append(html);
  }
});
}
