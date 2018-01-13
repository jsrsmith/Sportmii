$(document).ready(function() {
    $("#createLeagueDistrictCount").text("Characters left: " + (100 - $("#createLeagueDistrict").val().length));
$("#createLeagueDistrict").keyup(function(){
  $("#createLeagueDistrictCount").text("Characters left: " + (100 - $("#createLeagueDistrict").val().length));
});
});

$(document).ready(function() {
    $("#createLeagueDivisionCount").text("Characters left: " + (100 - $("#createLeagueDivision").val().length));
$("#createLeagueDivision").keyup(function(){
  $("#createLeagueDivisionCount").text("Characters left: " + (100 - $("#createLeagueDivision").val().length));
});
});