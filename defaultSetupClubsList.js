$(document).ready(function() {
$("#clubs").hover(function () {
    $('#myClubsList').show();
  }, 
);
});
    
$(document).ready(function() {
    
var timer;
    
$("#myClubsList, #clubs").mouseleave(function () {
    timer = setTimeout(removeMyClubsList, 10);
    }).mouseenter(function() {
    clearTimeout(timer);
});
});

function removeMyClubsList() {
    $('#myClubsList').hide();
}