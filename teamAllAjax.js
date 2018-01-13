$(document).ready(function()
{
    
    $.ajax({
  url: "teamLeagueTable.php",
  cache: false,
  success: function(html){
    $("#teamLeagueTable").empty();  
    $("#teamLeagueTable").append(html);
  }
});

 $.ajax({
  url: "teamScouting.php",
  cache: false,
  success: function(html){
    $("#teamScoutingSetup").empty();  
    $("#teamScoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "teamContactDetails.php",
  cache: false,
  success: function(html){
    $("#teamContactDetails").empty();  
    $("#teamContactDetails").append(html);
  }
});
         
 $.ajax({
  url: "teamRegister.php",
  cache: false,
  success: function(html){
    $("#teamRegister").empty();  
    $("#teamRegister").append(html);
  }
});
    
$.ajax({
  url: "teamControl.php",
  cache: false,
  success: function(html){
    $("#teamControl").empty();  
    $("#teamControl").append(html);
  }
});
    
    
 $.ajax({
  url: "teamDetails.php",
  cache: false,
  success: function(html){
    $("#teamDetails").empty();  
    $("#teamDetails").append(html);
  }
});
    
  $.ajax({
  url: "teamTopScorers.php",
  cache: false,
  success: function(html){
    $("#teamTopScorers").empty();  
    $("#teamTopScorers").append(html);
  }
});
    
 $.ajax({
  url: "teamRegisteredPlayers.php",
  cache: false,
  success: function(html){
    $("#teamRegisteredPlayers").empty();  
    $("#teamRegisteredPlayers").append(html);
  }
});
    
 $.ajax({
  url: "teamDiscipline.php",
  cache: false,
  success: function(html){
    $("#teamDiscipline").empty();  
    $("#teamDiscipline").append(html);
  }
});
    
 $.ajax({
  url: "teamFeed.php",
  cache: false,
  success: function(html){
    $("#teamFeed").empty();  
    $("#teamFeed").append(html);
  }
});
   
    
});