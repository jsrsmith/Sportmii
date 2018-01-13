$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#smallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
     beforeShowDay: highlightDays,
      onSelect: function(){
        navigateCalendar();
            }
    });


function highlightDays(date) {
      for (var i = 0; i < event.length; i++) {
            if (new Date(event[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
    
    function navigateCalendar()
{
 window.location.href = "calendar.php";
}
        
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var smallDaynum1  =   $(this).text();
    var smallMonth1   =   $('.ui-datepicker-month').text();
    var smallYear1    =   $('.ui-datepicker-year').text();

   var smallDate = smallDaynum1 + " " + smallMonth1 + " " + smallYear1;

   $.ajax({
    url: "smallerEvents.php",
    cache: false,
    type: "POST",
        data: {smallDate: smallDate},
        dataType: "html",
        success: function(html){
    $("#smallerEventContent").empty();  
    $("#smallerEventContent").append(html);
  }
    });
    
});
   

    
    
    
    
    
    
    
    
    
    
    