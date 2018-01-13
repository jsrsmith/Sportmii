$(document).ready(function()
{

  var yearDropdown = $("#leaguesYearDropdownList").val();
    
 $.ajax({
  url: "leaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $("#leaguesDistrictDropdown").empty();  
    $("#leaguesDistrictDropdown").append(html);
  }
});
});




$(document).ready(function()
{
 $('#leaguesYearDropdownList').change(function () {  
    updateDropdownsFromYear();
 });

});

function updateDropdownsFromYear()
{
  var yearDropdown = $("#leaguesYearDropdownList").val();
    
 $.ajax({
  url: "leaguesDistrictDropdown.php",
  cache: false,
    type: "POST",
     data: {yearDropdown: yearDropdown, sportFromYear:sportFromYear},
     dataType: "html",
  success: function(html){
    $("#leaguesDistrictDropdown").empty();  
    $("#leaguesDistrictDropdown").append(html);
  }
});
}