$(document).ready(function()
{
 $("#clubEditeventdiv").click(function(){
  clubShoweditpopup();
  clubLoadediteventsajax()
 });
});

function clubShoweditpopup()
{
 $("#clubEditeventspopup").fadeIn();
 $("#clubEditeventspopup").css({"visibility":"visible","display":"block"});
}

function clubLoadediteventsajax()
{
 $.ajax({
  url: "clubEditevents.php",
  cache: false,
  success: function(html){
    $("#clubEditeventspopup").empty();  
    $("#clubEditeventspopup").append(html);
  }
});
}