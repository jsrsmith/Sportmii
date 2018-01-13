$(document).ready(function() {
    $("#aboutMeIntroductionCount").text("Characters left: " + (250 - $("#aboutMeIntroductionText").val().length));
$("#aboutMeIntroductionText").keyup(function(){
  $("#aboutMeIntroductionCount").text("Characters left: " + (250 - $("#aboutMeIntroductionText").val().length));
});
});