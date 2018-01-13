$(document).ready(function()
{   
$(".likesAjax").each(function() {
    var feedID = $(this).attr("data-id");

   
 $.ajax({
  url: "viewClubFeedLikes.php",
  cache: false,
    type: "POST",
     data: {feedID: feedID},
     dataType: "html",
  success: function(html){
    $(".likesAjax[data-id='"+ feedID +"']").empty();  
    $(".likesAjax[data-id='"+ feedID +"']").append(html);
  }
});
}); 

});