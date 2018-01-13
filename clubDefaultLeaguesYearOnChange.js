$(document).ready(function()
{

  var yearDropdown = $("#clubDefaultLeaguesYearDropdownList").val();
    
 $.ajax({
  url: "clubDefaultLeaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesDistrictDropdown").empty();  
    $(".clubDefaultLeaguesDistrictDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#clubDefaultLeaguesYearDropdownList').change(function () {  
    clubDefaultLeaguesupdateDropdownsFromYear();
 });

});

function clubDefaultLeaguesupdateDropdownsFromYear()
{
  var yearDropdown = $("#clubDefaultLeaguesYearDropdownList").val();
    
 $.ajax({
  url: "clubDefaultLeaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesDistrictDropdown").empty();  
    $(".clubDefaultLeaguesDistrictDropdown").append(html);
  }
});
}