$(document).ready(function()
{

  var yearDropdown = $("#fixturesResultsYearDropdownList").val();
    
 $.ajax({
  url: "fixturesResultsDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsDistrictDropdown").empty();  
    $("#fixturesResultsDistrictDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#fixturesResultsYearDropdownList').change(function () {  
    updateDropdownsFromYearfixturesResults();
 });

});

function updateDropdownsFromYearfixturesResults()
{
  var yearDropdown = $("#fixturesResultsYearDropdownList").val();
    
 $.ajax({
  url: "fixturesResultsDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsDistrictDropdown").empty();  
    $("#fixturesResultsDistrictDropdown").append(html);
  }
});
}