$(document).ready(function()
{

  var ageDropdown = $("#fixturesResultsAgeDropdownList").val();

    
 $.ajax({
  url: "fixturesResultsDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsDivisionDropdown").empty();  
    $("#fixturesResultsDivisionDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#fixturesResultsAgeDropdownList').change(function () {  
    updateDropdownsFromAgefixturesResults();
 });

});

function updateDropdownsFromAgefixturesResults()
{
  var ageDropdown = $("#fixturesResultsAgeDropdownList").val();
    
 $.ajax({
  url: "fixturesResultsDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsDivisionDropdown").empty();  
    $("#fixturesResultsDivisionDropdown").append(html);
  }
});
}