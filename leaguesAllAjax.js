$(document).ready(function()
{

 $.ajax({
  url: "leaguesSportDropdown.php",
  cache: false,
  success: function(html){
    $("#leaguesSportDropdown").empty();  
    $("#leaguesSportDropdown").append(html);
  }
});
    
    
 $.ajax({
  url: "leaguesYearDropdown.php",
  cache: false,
  success: function(html){
    $("#leaguesYearDropdown").empty();  
    $("#leaguesYearDropdown").append(html);
  }
});
         
 $.ajax({
  url: "leaguesDistrictDropdown.php",
  cache: false,
  success: function(html){
    $("#leaguesDistrictDropdown").empty();  
    $("#leaguesDistrictDropdown").append(html);
  }
});
    
 $.ajax({
  url: "leaguesAgeDropdown.php",
  cache: false,
  success: function(html){
    $("#leaguesAgeDropdown").empty();  
    $("#leaguesAgeDropdown").append(html);
  }
});
    
 $.ajax({
  url: "leaguesDivisionDropdown.php",
  cache: false,
  success: function(html){
    $("#leaguesDivisionDropdown").empty();  
    $("#leaguesDivisionDropdown").append(html);
  }
});    
});