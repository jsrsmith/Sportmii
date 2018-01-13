$(document).ready(function()
{
 $('#clubEditeventsform').on('submit', function (e) {  
    e.preventDefault();
    clubLoadediteventsajax2();
 });

});

function clubLoadediteventsajax2()
{
  var clubTitleevent = $("#clubEditableventslist").val();
    
 $.ajax({
  url: "clubEditevents2.php",
  cache: false,
    type: "POST",
     data: {clubTitleevent: clubTitleevent},
     dataType: "html",
  success: function(html){
    $("#clubEditeventspopup").empty();  
    $("#clubEditeventspopup").append(html);
  }
});
}