$(document).ready(function()
{

 $.ajax({
  url: "clubDefaultLeaguesSportDropdown.php",
  cache: false,
  success: function(html){
    $(".clubDefaultLeaguesSportDropdown").empty();  
    $(".clubDefaultLeaguesSportDropdown").append(html);
  }
});
    
    
 $.ajax({
  url: "clubDefaultLeaguesYearDropdown.php",
  cache: false,
  success: function(html){
    $(".clubDefaultLeaguesYearDropdown").empty();  
    $(".clubDefaultLeaguesYearDropdown").append(html);
  }
});
         
 $.ajax({
  url: "clubDefaultLeaguesDistrictDropdown.php",
  cache: false,
  success: function(html){
    $(".clubDefaultLeaguesDistrictDropdown").empty();  
    $(".clubDefaultLeaguesDistrictDropdown").append(html);
  }
});
    
 $.ajax({
  url: "clubDefaultLeaguesAgeDropdown.php",
  cache: false,
  success: function(html){
    $(".clubDefaultLeaguesAgeDropdown").empty();  
    $(".clubDefaultLeaguesAgeDropdown").append(html);
  }
});
    
 $.ajax({
  url: "clubDefaultLeaguesDivisionDropdown.php",
  cache: false,
  success: function(html){
    $(".clubDefaultLeaguesDivisionDropdown").empty();  
    $(".clubDefaultLeaguesDivisionDropdown").append(html);
  }
});    
});