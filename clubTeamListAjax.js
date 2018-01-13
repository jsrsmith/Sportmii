$(document).ready(function()
{                

var changeTimer = false;

$("#clubTeamListID").on("keydown", function(){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){

 var teamListCreateTeamID = $("#clubTeamListID").val();
            
 $.ajax({
  url: "clubTeamListCheckTeamID.php",
  cache: false,
    type: "POST",
     data: {teamListCreateTeamID: teamListCreateTeamID},
     dataType: "html",
  success: function(html){
    $("#clubTeamListCheckTeamID").empty();  
    $("#clubTeamListCheckTeamID").append(html);
  }
});
            changeTimer = false;
        },300);
});
    
});