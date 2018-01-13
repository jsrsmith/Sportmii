$(document).ready(function()
{

  var ageDropdown = $("#leaguesAgeDropdownList").val();

    
 $.ajax({
  url: "leaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $("#leaguesDivisionDropdown").empty();  
    $("#leaguesDivisionDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#leaguesAgeDropdownList').change(function () {  
    updateDropdownsFromAge();
 });

});

function updateDropdownsFromAge()
{
  var ageDropdown = $("#leaguesAgeDropdownList").val();
    
 $.ajax({
  url: "leaguesDivisionDropdown.php",
  cache: false,
    type: "POST",
     data: {ageDropdown:ageDropdown, sportFromAge:sportFromAge, yearFromAge:yearFromAge, districtFromAge:districtFromAge},
     dataType: "html",
  success: function(html){
    $("#leaguesDivisionDropdown").empty();  
    $("#leaguesDivisionDropdown").append(html);
  }
});
}