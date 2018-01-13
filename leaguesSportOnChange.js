$(document).ready(function()
{

  var sportDropdown = $("#leaguesSportDropdownList").val();
    
 $.ajax({
  url: "leaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $("#leaguesYearDropdown").empty();  
    $("#leaguesYearDropdown").append(html);
  }
});   
    
});




$(document).ready(function()
{
 $('#leaguesSportDropdownList').change(function () {  
    updateDropdownsFromSport();
 });

});

function updateDropdownsFromSport()
{
  var sportDropdown = $("#leaguesSportDropdownList").val();
    
$.ajax({
  url: "leaguesYearDropdown.php",
  cache: false,
    type: "POST",
     data: {sportDropdown: sportDropdown},
     dataType: "html",
  success: function(html){
    $("#leaguesYearDropdown").empty();  
    $("#leaguesYearDropdown").append(html);
  }
});
}