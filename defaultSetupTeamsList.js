$(document).ready(function() {
$("#teams").hover(function () {
    $('#myTeamsList').show();
  }, 
);
});
    
$(document).ready(function() {
    
var timer;
    
$("#myTeamsList, #teams").mouseleave(function () {
    timer = setTimeout(removeMyTeamsList, 10);
    }).mouseenter(function() {
    clearTimeout(timer);
});
});

function removeMyTeamsList() {
    $('#myTeamsList').hide();
}