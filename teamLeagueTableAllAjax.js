$(document).ready(function()
{

 $.ajax({
  url: "teamDefaultLeaguesSportDropdown.php",
  cache: false,
  success: function(html){
    $(".teamDefaultLeaguesSportDropdown").empty();  
    $(".teamDefaultLeaguesSportDropdown").append(html);
  }
});
    
    
 $.ajax({
  url: "teamDefaultLeaguesYearDropdown.php",
  cache: false,
  success: function(html){
    $(".teamDefaultLeaguesYearDropdown").empty();  
    $(".teamDefaultLeaguesYearDropdown").append(html);
  }
});
         
 $.ajax({
  url: "teamDefaultLeaguesDistrictDropdown.php",
  cache: false,
  success: function(html){
    $(".teamDefaultLeaguesDistrictDropdown").empty();  
    $(".teamDefaultLeaguesDistrictDropdown").append(html);
  }
});
    
 $.ajax({
  url: "teamDefaultLeaguesAgeDropdown.php",
  cache: false,
  success: function(html){
    $(".teamDefaultLeaguesAgeDropdown").empty();  
    $(".teamDefaultLeaguesAgeDropdown").append(html);
  }
});
    
 $.ajax({
  url: "teamDefaultLeaguesDivisionDropdown.php",
  cache: false,
  success: function(html){
    $(".teamDefaultLeaguesDivisionDropdown").empty();  
    $(".teamDefaultLeaguesDivisionDropdown").append(html);
  }
});    
});