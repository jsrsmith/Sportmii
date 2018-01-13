$(document).ready(function()
{
 $.ajax({
  url: "viewProfileLeagueTable.php",
  cache: false,
  success: function(html){
    $("#viewProfileLeague").empty();  
    $("#viewProfileLeague").append(html);
  }
});    
    
    
 $.ajax({
  url: "viewProfileScouting.php",
  cache: false,
  success: function(html){
    $("#viewProfileScoutingSetup").empty();  
    $("#viewProfileScoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "viewProfileAboutMe.php",
  cache: false,
  success: function(html){
    $("#viewProfileAboutMe").empty();  
    $("#viewProfileAboutMe").append(html);
  }
});   
    
 $.ajax({
  url: "viewProfilePositions.php",
  cache: false,
  success: function(html){
    $("#viewProfilePositions").empty();  
    $("#viewProfilePositions").append(html);
  }
});

 $.ajax({
  url: "viewProfileSeasonStats.php",
  cache: false,
  success: function(html){
    $("#viewProfileSeasonStats").empty();  
    $("#viewProfileSeasonStats").append(html);
  }
});   
    
    
 $.ajax({
  url: "viewProfileFeed.php",
  cache: false,
  success: function(html){
    $("#viewProfileFeed").empty();  
    $("#viewProfileFeed").append(html);
  }
});
    
    
});