$(document).ready(function()
{
    
 $.ajax({
  url: "viewClubLeagueTable.php",
  cache: false,
  success: function(html){
    $("#viewClubLeague").empty();  
    $("#viewClubLeague").append(html);
  }
});
    

 $.ajax({
  url: "viewClubScouting.php",
  cache: false,
  success: function(html){
    $("#viewClubScoutingSetup").empty();  
    $("#viewClubScoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "viewClubContactDetails.php",
  cache: false,
  success: function(html){
    $("#viewClubContactDetails").empty();  
    $("#viewClubContactDetails").append(html);
  }
});
    
    
 $.ajax({
  url: "viewClubDetails.php",
  cache: false,
  success: function(html){
    $("#viewClubDetails").empty();  
    $("#viewClubDetails").append(html);
  }
});
    
 $.ajax({
  url: "viewClubTeamList.php",
  cache: false,
  success: function(html){
    $("#viewClubTeamList").empty();  
    $("#viewClubTeamList").append(html);
  }
});
    
    
 $.ajax({
  url: "viewClubKeyOfficials.php",
  cache: false,
  success: function(html){
    $("#viewClubKeyOfficials").empty();  
    $("#viewClubKeyOfficials").append(html);
  }
}); 
    
     $.ajax({
  url: "viewClubPlayersList.php",
  cache: false,
  success: function(html){
    $("#viewClubPlayersList").empty();  
    $("#viewClubPlayersList").append(html);
  }
}); 
    
$.ajax({
url: "viewClubFeed.php",
cache: false,
success: function(html){
    $("#viewClubFeed").empty();  
    $("#viewClubFeed").append(html);
  }
});

    
});