$(document).ready(function()
{                

var changeTimer = false;

$("#createAddTeamID").on("keydown", function(){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){

 var leaguesCreateTeamID = $("#createAddTeamID").val();
            
 $.ajax({
  url: "leaguesCreateCheckTeamID.php",
  cache: false,
    type: "POST",
     data: {leaguesCreateTeamID: leaguesCreateTeamID},
     dataType: "html",
  success: function(html){
    $("#checkTeamID").empty();  
    $("#checkTeamID").append(html);
  }
});
            changeTimer = false;
        },300);
});
    
});