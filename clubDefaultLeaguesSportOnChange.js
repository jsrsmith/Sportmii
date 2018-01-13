$(document).ready(function()
{

  var sportDropdown = $("#clubDefaultLeaguesSportDropdownList").val();
    
 $.ajax({
  url: "clubDefaultLeaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesYearDropdown").empty();  
    $(".clubDefaultLeaguesYearDropdown").append(html);
  }
});   
    
});




$(document).ready(function()
{
 $('#clubDefaultLeaguesSportDropdownList').change(function () {  
    clubDefaultLeaguesupdateDropdownsFromSport();
 });

});

function clubDefaultLeaguesupdateDropdownsFromSport()
{
  var sportDropdown = $("#clubDefaultLeaguesSportDropdownList").val();
    
$.ajax({
  url: "clubDefaultLeaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $(".clubDefaultLeaguesYearDropdown").empty();  
    $(".clubDefaultLeaguesYearDropdown").append(html);
  }
});
}