$(document).ready(function()
{
 $.ajax({
  url: "profileLeagueTable.php",
  cache: false,
  success: function(html){
    $("#league").empty();  
    $("#league").append(html);
  }
});


 $.ajax({
  url: "profileScouting.php",
  cache: false,
  success: function(html){
    $("#scoutingSetup").empty();  
    $("#scoutingSetup").append(html);
  }
});
    
 $.ajax({
  url: "profileAboutMe.php",
  cache: false,
  success: function(html){
    $("#aboutMe").empty();  
    $("#aboutMe").append(html);
  }
});   
    
 $.ajax({
  url: "profilePositions.php",
  cache: false,
  success: function(html){
    $("#positions").empty();  
    $("#positions").append(html);
  }
});

 $.ajax({
  url: "ProfileSeasonStats.php",
  cache: false,
  success: function(html){
    $("#seasonStats").empty();  
    $("#seasonStats").append(html);
  }
});
    
 $.ajax({
  url: "ProfileFeed.php",
  cache: false,
  success: function(html){
    $("#feed").empty();  
    $("#feed").append(html);
  }
});
    
    
});