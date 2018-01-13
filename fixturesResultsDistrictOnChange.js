$(document).ready(function()
{

  var districtDropdown = $("#fixturesResultsDistrictDropdownList").val();

    
 $.ajax({
  url: "fixturesResultsAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsAgeDropdown").empty();  
    $("#fixturesResultsAgeDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#fixturesResultsDistrictDropdownList').change(function () {  
    updateDropdownsFromDistrictfixturesResults();
 });

});

function updateDropdownsFromDistrictfixturesResults()
{
  var districtDropdown = $("#fixturesResultsDistrictDropdownList").val();
    
 $.ajax({
  url: "fixturesResultsAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsAgeDropdown").empty();  
    $("#fixturesResultsAgeDropdown").append(html);
  }
});
}