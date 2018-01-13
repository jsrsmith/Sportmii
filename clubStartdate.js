$(document).ready(function() {

$(function() { //shorthand document.ready function
    $('#clubEventsform').on('submit', function(/*e*/) { //use on if jQuery 1.7+
       /* e.preventDefault();*/  //prevent form from submitting
        $("#clubStartdate").val($("#clubStartdatespan").text());
    });
});
    
});