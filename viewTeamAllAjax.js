$(document).ready(function()
{
    
 $.ajax({
  url: "viewTeamLeagueTable.php",
  cache: false,
  success: function(html){
    $("#viewTeamLeague").empty();  
    $("#viewTeamLeague").append(html);
  }
});
    

 $.ajax({
  url: "viewTeamScouting.php",
  cache: false,
  success: function(html){
    $("#viewTeamScoutingSetup").empty();  
    $("#viewTeamScoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "viewTeamContactDetails.php",
  cache: false,
  success: function(html){
    $("#viewTeamContactDetails").empty();  
    $("#viewTeamContactDetails").append(html);
  }
});
    
    
 $.ajax({
  url: "viewTeamDetails.php",
  cache: false,
  success: function(html){
    $("#viewTeamDetails").empty();  
    $("#viewTeamDetails").append(html);
  }
});
    
$.ajax({
  url: "viewTeamTopScorers.php",
  cache: false,
  success: function(html){
    $("#viewTeamTopScorers").empty();  
    $("#viewTeamTopScorers").append(html);
  }
});
    
 $.ajax({
  url: "viewTeamRegister.php",
  cache: false,
  success: function(html){
    $("#viewTeamRegister").empty();  
    $("#viewTeamRegister").append(html);
  }
});
    
 $.ajax({
  url: "viewTeamRegisteredPlayers.php",
  cache: false,
  success: function(html){
    $("#viewTeamRegisteredPlayers").empty();  
    $("#viewTeamRegisteredPlayers").append(html);
  }
});
    
 $.ajax({
  url: "viewTeamDiscipline.php",
  cache: false,
  success: function(html){
    $("#viewTeamDiscipline").empty();  
    $("#viewTeamDiscipline").append(html);
  }
});
    
$.ajax({
url: "viewTeamFeed.php",
cache: false,
success: function(html){
    $("#viewTeamFeed").empty();  
    $("#viewTeamFeed").append(html);
  }
});
    
});