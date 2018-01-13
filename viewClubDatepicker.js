$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#viewClubDatepickerCal').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: viewClubHighlightDays,
    });


function viewClubHighlightDays(date) {
      for (var i = 0; i < viewClubEventCal.length; i++) {
            if (new Date(viewClubEventCal[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var viewClubDaynum1  =   $(this).text();
    var viewClubMonth1   =   $('.ui-datepicker-month').text();
    var viewClubYear1    =   $('.ui-datepicker-year').text();

   var viewClubMyDate = viewClubDaynum1 + " " + viewClubMonth1 + " " + viewClubYear1;
    $('#viewClubHeadingcontent').html(viewClubMyDate);

   $.ajax({
    url: "viewClubEvents.php",
    cache: false,
    type: "POST",
        data: {viewClubMyDate: viewClubMyDate},
        dataType: "html",
        success: function(html){
    $("#viewClubEventcontent").empty();  
    $("#viewClubEventcontent").append(html);
  }
    });
    
});
   