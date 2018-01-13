$(document).ready(function()
{
 $("#chooseCreateTeam").on( "click", function() {
    setupTeamPage();
 });
    
$("#chooseCreateClub").on( "click", function() {
    setupClubPage();
 });

});

function setupTeamPage()
{

  var createTeamSport = $("#newTeamClubDropdown").val();
/*
  var createTeamSport = ["hello"];  
*/
 $.ajax({
  url: "createTeam.php",
  cache: false,
    type: "POST",
     data: {createTeamSport: createTeamSport},
     dataType: "html",
  success: function(html){
$("#setupCreateTeam").empty();  
$("#setupCreateTeam").append(html);
 $("#chooseTeamOrClub").css({"visibility":"hidden","display":"none"});
 $("#setupCreateTeam").css({"visibility":"visible"});
  }
});
}

$(document).ready(function()
{
 $("#chooseCreateClub").on( "click", function() {
    setupClubPage();
 });

});

function setupClubPage()
{

  var createClubSport = $("#newTeamClubDropdown").val();
/*
  var createTeamSport = ["hello"];  
*/
 $.ajax({
  url: "createClub.php",
  cache: false,
    type: "POST",
     data: {createClubSport: createClubSport},
     dataType: "html",
  success: function(html){
$("#setupCreateClub").empty();  
$("#setupCreateClub").append(html);
 $("#chooseTeamOrClub").css({"visibility":"hidden","display":"none"});
 $("#setupCreateClub").css({"visibility":"visible"});
  }
});
}