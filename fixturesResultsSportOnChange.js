$(document).ready(function()
{

  var sportDropdown = $("#fixturesResultsSportDropdownList").val();
    
 $.ajax({
  url: "fixturesResultsYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsYearDropdown").empty();  
    $("#fixturesResultsYearDropdown").append(html);
  }
});   
    
});




$(document).ready(function()
{
 $('#fixturesResultsSportDropdownList').change(function () {  
    updateDropdownsFromSportfixturesResults();
 });

});

function updateDropdownsFromSportfixturesResults()
{
  var sportDropdown = $("#fixturesResultsSportDropdownList").val();
    
$.ajax({
  url: "fixturesResultsYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsYearDropdown").empty();  
    $("#fixturesResultsYearDropdown").append(html);
  }
});
}