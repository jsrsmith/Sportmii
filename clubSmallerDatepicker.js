$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#clubSmallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: clubHighlightDays,
      onSelect: function(){
        clubNavigateCalendar();
            }
    });


function clubHighlightDays(date) {
      for (var i = 0; i < clubEvent.length; i++) {
            if (new Date(clubEvent[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
    
    function clubNavigateCalendar()
{
 window.location.href = "clubCalendar.php";
}
        
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var clubSmallDaynum1  =   $(this).text();
    var clubSmallMonth1   =   $('.ui-datepicker-month').text();
    var clubSmallYear1    =   $('.ui-datepicker-year').text();

   var clubSmallDate = clubSmallDaynum1 + " " + clubSmallMonth1 + " " + clubSmallYear1;
    
    
   $.ajax({
    url: "clubSmallerEvents.php",
    cache: false,
    type: "POST",
    data: {clubSmallDate:clubSmallDate, clubID:clubID},
    dataType: "html",
    success: function(html){
    $("#clubSmallerEventContent").empty();  
    $("#clubSmallerEventContent").append(html);
   }
    });
    
});