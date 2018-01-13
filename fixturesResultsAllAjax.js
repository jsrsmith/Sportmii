$(document).ready(function()
{

 $.ajax({
  url: "fixturesResultsSportDropdown.php",
  cache: false,
  success: function(html){
    $("#fixturesResultsSportDropdown").empty();  
    $("#fixturesResultsSportDropdown").append(html);
  }
});
    
    
 $.ajax({
  url: "fixturesResultsYearDropdown.php",
  cache: false,
  success: function(html){
    $("#fixturesResultsYearDropdown").empty();  
    $("#fixturesResultsYearDropdown").append(html);
  }
});
         
 $.ajax({
  url: "fixturesResultsDistrictDropdown.php",
  cache: false,
  success: function(html){
    $("#fixturesResultsDistrictDropdown").empty();  
    $("#fixturesResultsDistrictDropdown").append(html);
  }
});
    
 $.ajax({
  url: "fixturesResultsAgeDropdown.php",
  cache: false,
  success: function(html){
    $("#fixturesResultsAgeDropdown").empty();  
    $("#fixturesResultsAgeDropdown").append(html);
  }
});
    
 $.ajax({
  url: "fixturesResultsDivisionDropdown.php",
  cache: false,
  success: function(html){
    $("#fixturesResultsDivisionDropdown").empty();  
    $("#fixturesResultsDivisionDropdown").append(html);
  }
});    
});