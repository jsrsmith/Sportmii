$(document).ready(function()
{
 $('#teamEditeventsform').on('submit', function (e) {  
    e.preventDefault();
    teamLoadediteventsajax2();
 });

});

function teamLoadediteventsajax2()
{
  var teamTitleevent = $("#teamEditableventslist").val();
    
 $.ajax({
  url: "teamEditevents2.php",
  cache: false,
    type: "POST",
     data: {teamTitleevent: teamTitleevent},
     dataType: "html",
  success: function(html){
    $("#teamEditeventspopup").empty();  
    $("#teamEditeventspopup").append(html);
  }
});
}