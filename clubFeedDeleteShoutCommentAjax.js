$(document).ready(function()
{   
$(".deleteShoutCommentAjax").each(function() {
    var commentIDDelete = $(this).attr("data-id");

   
 $.ajax({
  url: "clubFeedDeleteComment.php",
  cache: false,
    type: "POST",
     data: {commentIDDelete: commentIDDelete},
     dataType: "html",
  success: function(html){
    $(".deleteShoutCommentAjax[data-id='"+ commentIDDelete +"']").empty();
    $(".deleteShoutCommentAjax[data-id='"+ commentIDDelete +"']").append(html);
  }
});
}); 

});