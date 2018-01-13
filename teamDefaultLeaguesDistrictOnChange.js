$(document).ready(function()
{

  var districtDropdown = $("#teamDefaultLeaguesDistrictDropdownList").val();

    
 $.ajax({
  url: "teamDefaultLeaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesAgeDropdown").empty();  
    $(".teamDefaultLeaguesAgeDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#teamDefaultLeaguesDistrictDropdownList').change(function () {  
    teamDefaultLeaguesupdateDropdownsFromDistrict();
 });

});

function teamDefaultLeaguesupdateDropdownsFromDistrict()
{
  var districtDropdown = $("#teamDefaultLeaguesDistrictDropdownList").val();
    
 $.ajax({
  url: "teamDefaultLeaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesAgeDropdown").empty();  
    $(".teamDefaultLeaguesAgeDropdown").append(html);
  }
});
}