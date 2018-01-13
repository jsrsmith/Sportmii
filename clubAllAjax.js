$(document).ready(function()
{
    
    $.ajax({
  url: "clubLeagueTable.php",
  cache: false,
  success: function(html){
    $("#clubLeagueTable").empty();  
    $("#clubLeagueTable").append(html);
  }
});

 $.ajax({
  url: "clubScouting.php",
  cache: false,
  success: function(html){
    $("#clubScoutingSetup").empty();  
    $("#clubScoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "clubContactDetails.php",
  cache: false,
  success: function(html){
    $("#clubContactDetails").empty();  
    $("#clubContactDetails").append(html);
  }
});
    
$.ajax({
  url: "clubControl.php",
  cache: false,
  success: function(html){
    $("#clubControl").empty();  
    $("#clubControl").append(html);
  }
});
    
    
 $.ajax({
  url: "clubDetails.php",
  cache: false,
  success: function(html){
    $("#clubDetails").empty();  
    $("#clubDetails").append(html);
  }
});

    
 $.ajax({
  url: "clubRegisteredPlayers.php",
  cache: false,
  success: function(html){
    $("#clubRegisteredPlayers").empty();  
    $("#clubRegisteredPlayers").append(html);
  }
});
    

 $.ajax({
  url: "clubTeamList.php",
  cache: false,
  success: function(html){
    $("#clubTeamList").empty();  
    $("#clubTeamList").append(html);
  }
});
    
    
 $.ajax({
  url: "clubKeyOfficials.php",
  cache: false,
  success: function(html){
    $("#clubKeyOfficials").empty();  
    $("#clubKeyOfficials").append(html);
  }
}); 
    
     $.ajax({
  url: "clubPlayersList.php",
  cache: false,
  success: function(html){
    $("#clubPlayersList").empty();  
    $("#clubPlayersList").append(html);
  }
}); 
    
 $.ajax({
  url: "clubFeed.php",
  cache: false,
  success: function(html){
    $("#clubFeed").empty();  
    $("#clubFeed").append(html);
  }
});
   
    
});