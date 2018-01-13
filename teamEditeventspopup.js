$(document).ready(function()
{
 $("#teamEditeventdiv").click(function(){
  teamShoweditpopup();
  teamLoadediteventsajax()
 });
});

function teamShoweditpopup()
{
 $("#teamEditeventspopup").fadeIn();
 $("#teamEditeventspopup").css({"visibility":"visible","display":"block"});
}

function teamLoadediteventsajax()
{
 $.ajax({
  url: "teamEditevents.php",
  cache: false,
  success: function(html){
    $("#teamEditeventspopup").empty();  
    $("#teamEditeventspopup").append(html);
  }
});
}
