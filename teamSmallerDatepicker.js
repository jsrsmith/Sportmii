$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#teamSmallDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: teamHighlightDays,
      onSelect: function(){
        teamNavigateCalendar();
            }
    });


function teamHighlightDays(date) {
      for (var i = 0; i < teamEvent.length; i++) {
            if (new Date(teamEvent[i]).toString() == date.toString()) {
                return [true, 'ui-state-event', ''];
            }
        }
        return [true, ''];
    }
    
    
    function teamNavigateCalendar()
{
 window.location.href = "teamCalendar.php";
}
        
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var teamSmallDaynum1  =   $(this).text();
    var teamSmallMonth1   =   $('.ui-datepicker-month').text();
    var teamSmallYear1    =   $('.ui-datepicker-year').text();

   var teamSmallDate = teamSmallDaynum1 + " " + teamSmallMonth1 + " " + teamSmallYear1;
    
    
   $.ajax({
    url: "teamSmallerEvents.php",
    cache: false,
    type: "POST",
    data: {teamSmallDate:teamSmallDate, teamID:teamID},
    dataType: "html",
    success: function(html){
    $("#teamSmallerEventContent").empty();  
    $("#teamSmallerEventContent").append(html);
   }
    });
    
});
   