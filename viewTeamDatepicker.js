$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#viewTeamDatepickerCal').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: viewTeamHighlightDays,
    });


function viewTeamHighlightDays(date) {
      for (var i = 0; i < viewTeamEventCal.length; i++) {
            if (new Date(viewTeamEventCal[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var viewTeamDaynum1  =   $(this).text();
    var viewTeamMonth1   =   $('.ui-datepicker-month').text();
    var viewTeamYear1    =   $('.ui-datepicker-year').text();

   var viewTeamMyDate = viewTeamDaynum1 + " " + viewTeamMonth1 + " " + viewTeamYear1;
    $('#viewTeamHeadingcontent').html(viewTeamMyDate);

   $.ajax({
    url: "viewTeamEvents.php",
    cache: false,
    type: "POST",
        data: {viewTeamMyDate: viewTeamMyDate},
        dataType: "html",
        success: function(html){
    $("#viewTeamEventcontent").empty();  
    $("#viewTeamEventcontent").append(html);
  }
    });
    
});
   

    
    
    
    
    
    
    
    
    
    
    