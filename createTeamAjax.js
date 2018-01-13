$(document).ready(function()
{

 $.ajax({
  url: "createTeam.php",
  cache: false,
  success: function(html){
    $("#setupCreateTeam").empty();  
    $("#setupCreateTeam").append(html);
  }
});
});