$(document).ready(function()
{   
$(".commentsAjax").each(function() {
    var feedIDComments = $(this).attr("data-id");

   
 $.ajax({
  url: "viewProfileFeedComments.php",
  cache: false,
    type: "POST",
     data: {feedIDComments: feedIDComments},
     dataType: "html",
  success: function(html){
    $(".commentsAjax[data-id='"+ feedIDComments +"']").empty();  
    $(".commentsAjax[data-id='"+ feedIDComments +"']").append(html);
  }
});
}); 

});