$(document).ready(function()
{

  var districtDropdown = $("#clubDefaultLeaguesDistrictDropdownList").val();

    
 $.ajax({
  url: "clubDefaultLeaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesAgeDropdown").empty();  
    $(".clubDefaultLeaguesAgeDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#clubDefaultLeaguesDistrictDropdownList').change(function () {  
    clubDefaultLeaguesupdateDropdownsFromDistrict();
 });

});

function clubDefaultLeaguesupdateDropdownsFromDistrict()
{
  var districtDropdown = $("#clubDefaultLeaguesDistrictDropdownList").val();
    
 $.ajax({
  url: "clubDefaultLeaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesAgeDropdown").empty();  
    $(".clubDefaultLeaguesAgeDropdown").append(html);
  }
});
}