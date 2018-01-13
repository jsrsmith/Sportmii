$(document).ready(function() {

$(function() { //shorthand document.ready function
    $('#eventsform').on('submit', function(/*e*/) { //use on if jQuery 1.7+
       /* e.preventDefault();*/  //prevent form from submitting
        $("#startdate").val($("#startdatespan").text());
    });
});
    
});