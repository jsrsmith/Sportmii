$(document).ready(function()
{

 $.ajax({
  url: "createClub.php",
  cache: false,
  success: function(html){
    $("#setupCreateClub").empty();  
    $("#setupCreateClub").append(html);
  }
});
});