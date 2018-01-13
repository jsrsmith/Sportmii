$(document).ready(function()
{

  var sportDropdown = $("#teamDefaultLeaguesSportDropdownList").val();
    
 $.ajax({
  url: "teamDefaultLeaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesYearDropdown").empty();  
    $(".teamDefaultLeaguesYearDropdown").append(html);
  }
});   
    
});




$(document).ready(function()
{
 $('#teamDefaultLeaguesSportDropdownList').change(function () {  
    teamDefaultLeaguesupdateDropdownsFromSport();
 });

});

function teamDefaultLeaguesupdateDropdownsFromSport()
{
  var sportDropdown = $("#teamDefaultLeaguesSportDropdownList").val();
    
$.ajax({
  url: "teamDefaultLeaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $(".teamDefaultLeaguesYearDropdown").empty();  
    $(".teamDefaultLeaguesYearDropdown").append(html);
  }
});
}