$(document).ready(function()
{

  var districtDropdown = $("#leaguesDistrictDropdownList").val();

    
 $.ajax({
  url: "leaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $("#leaguesAgeDropdown").empty();  
    $("#leaguesAgeDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#leaguesDistrictDropdownList').change(function () {  
    updateDropdownsFromDistrict();
 });

});

function updateDropdownsFromDistrict()
{
  var districtDropdown = $("#leaguesDistrictDropdownList").val();
    
 $.ajax({
  url: "leaguesAgeDropdown.php",
  cache: false,
    type: "POST",
     data: {districtDropdown:districtDropdown, sportFromDistrict:sportFromDistrict, yearFromDistrict:yearFromDistrict},
     dataType: "html",
  success: function(html){
    $("#leaguesAgeDropdown").empty();  
    $("#leaguesAgeDropdown").append(html);
  }
});
}