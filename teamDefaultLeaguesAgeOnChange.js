$(document).ready(function()
{

  var ageDropdown = $("#teamDefaultLeaguesAgeDropdownList").val();

    
 $.ajax({
  url: "teamDefaultLeaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesDivisionDropdown").empty();  
    $(".teamDefaultLeaguesDivisionDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#teamDefaultLeaguesAgeDropdownList').change(function () {  
    teamDefaultLeaguesupdateDropdownsFromAge();
 });

});

function teamDefaultLeaguesupdateDropdownsFromAge()
{
  var ageDropdown = $("#teamDefaultLeaguesAgeDropdownList").val();
    
 $.ajax({
  url: "teamDefaultLeaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesDivisionDropdown").empty();  
    $(".teamDefaultLeaguesDivisionDropdown").append(html);
  }
});
}