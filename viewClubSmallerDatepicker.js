$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#viewClubSmallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: viewClubHighlightDays,
      onSelect: function(){
        viewClubNavigateCalendar();
            }
    });


function viewClubHighlightDays(date) {
      for (var i = 0; i < viewClubEvent.length; i++) {
            if (new Date(viewClubEvent[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
    
    function viewClubNavigateCalendar()
{
 window.location.href = "viewClubCalendar.php";
}
        
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var viewClubSmallDaynum1  =   $(this).text();
    var viewClubSmallMonth1   =   $('.ui-datepicker-month').text();
    var viewClubSmallYear1    =   $('.ui-datepicker-year').text();

   var viewClubSmallDate = viewClubSmallDaynum1 + " " + viewClubSmallMonth1 + " " + viewClubSmallYear1;
    
    
   $.ajax({
    url: "viewClubSmallerEvents.php",
    cache: false,
    type: "POST",
    data: {viewClubSmallDate:viewClubSmallDate, clubID:clubID},
    dataType: "html",
    success: function(html){
    $("#viewClubSmallerEventContent").empty();  
    $("#viewClubSmallerEventContent").append(html);
   }
    });
    
});
   