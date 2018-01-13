$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#viewProfileSmallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: viewProfileHighlightDays,
            });
    });


function viewProfileHighlightDays(date) {
      for (var i = 0; i < viewProfileEvent.length; i++) {
            if (new Date(viewProfileEvent[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
        

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var viewProfileSmallDaynum1  =   $(this).text();
    var viewProfileSmallMonth1   =   $('.ui-datepicker-month').text();
    var viewProfileSmallYear1    =   $('.ui-datepicker-year').text();

   var viewProfileSmallDate = viewProfileSmallDaynum1 + " " + viewProfileSmallMonth1 + " " + viewProfileSmallYear1;
    
    
   $.ajax({
    url: "viewProfileSmallerEvents.php",
    cache: false,
    type: "POST",
    data: {viewProfileSmallDate:viewProfileSmallDate},
    dataType: "html",
    success: function(html){
    $("#viewProfileSmallerEventContent").empty();  
    $("#viewProfileSmallerEventContent").append(html);
   }
    });
    
});
   