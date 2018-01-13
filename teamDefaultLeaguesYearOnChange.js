$(document).ready(function()
{

  var yearDropdown = $("#teamDefaultLeaguesYearDropdownList").val();
    
 $.ajax({
  url: "teamDefaultLeaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesDistrictDropdown").empty();  
    $(".teamDefaultLeaguesDistrictDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#teamDefaultLeaguesYearDropdownList').change(function () {  
    teamDefaultLeaguesupdateDropdownsFromYear();
 });

});

function teamDefaultLeaguesupdateDropdownsFromYear()
{
  var yearDropdown = $("#teamDefaultLeaguesYearDropdownList").val();
    
 $.ajax({
  url: "teamDefaultLeaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesDistrictDropdown").empty();  
    $(".teamDefaultLeaguesDistrictDropdown").append(html);
  }
});
}