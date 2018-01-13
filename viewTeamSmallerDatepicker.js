$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#viewTeamSmallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: viewTeamHighlightDays,
      onSelect: function(){
        viewNavigateCalendar();
            }
    });


function viewTeamHighlightDays(date) {
      for (var i = 0; i < viewTeamEvent.length; i++) {
            if (new Date(viewTeamEvent[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
    
    function viewNavigateCalendar()
{
 window.location.href = "viewTeamCalendar.php";
}
        
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var viewTeamSmallDaynum1  =   $(this).text();
    var viewTeamSmallMonth1   =   $('.ui-datepicker-month').text();
    var viewTeamSmallYear1    =   $('.ui-datepicker-year').text();

   var viewTeamSmallDate = viewTeamSmallDaynum1 + " " + viewTeamSmallMonth1 + " " + viewTeamSmallYear1;
    
    
   $.ajax({
    url: "viewTeamSmallerEvents.php",
    cache: false,
    type: "POST",
    data: {viewTeamSmallDate:viewTeamSmallDate, teamID:teamID},
    dataType: "html",
    success: function(html){
    $("#viewTeamSmallerEventContent").empty();  
    $("#viewTeamSmallerEventContent").append(html);
   }
    });
    
});
   