$(document).ready(function()
{
 $('#editeventsform').on('submit', function (e) {  
    e.preventDefault();
    loadediteventsajax2();
 });

});

function loadediteventsajax2()
{
  var titleevent = $("#editableventslist").val();
    
 $.ajax({
  url: "editevents2.php",
  cache: false,
    type: "POST",
     data: {titleevent: titleevent},
     dataType: "html",
  success: function(html){
    $("#editeventspopup").empty();  
    $("#editeventspopup").append(html);
  }
});
}