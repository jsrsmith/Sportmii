$(document).ready(function()
{   
$(".deleteShoutAjax").each(function() {
    var feedIDDelete = $(this).attr("data-id");

   
 $.ajax({
  url: "profileFeedDeleteShout.php",
  cache: false,
    type: "POST",
     data: {feedIDDelete: feedIDDelete},
     dataType: "html",
  success: function(html){
    $(".deleteShoutAjax[data-id='"+ feedIDDelete +"']").empty();
    $(".deleteShoutAjax[data-id='"+ feedIDDelete +"']").append(html);
  }
});
}); 

});