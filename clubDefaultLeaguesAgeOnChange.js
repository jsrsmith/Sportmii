$(document).ready(function()
{

  var ageDropdown = $("#clubDefaultLeaguesAgeDropdownList").val();

    
 $.ajax({
  url: "clubDefaultLeaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesDivisionDropdown").empty();  
    $(".clubDefaultLeaguesDivisionDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#clubDefaultLeaguesAgeDropdownList').change(function () {  
    clubDefaultLeaguesupdateDropdownsFromAge();
 });

});

function clubDefaultLeaguesupdateDropdownsFromAge()
{
  var ageDropdown = $("#clubDefaultLeaguesAgeDropdownList").val();
    
 $.ajax({
  url: "clubDefaultLeaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesDivisionDropdown").empty();  
    $(".clubDefaultLeaguesDivisionDropdown").append(html);
  }
});
}