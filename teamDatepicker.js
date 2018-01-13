$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#teamDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: teamHighlightDays,
      onSelect: function(dateText, inst){
        teamShowpopup();
        teamGetdatespan();
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

function teamShowpopup()
{
 $("#teamEventspopup").fadeIn();
 $("#teamEventspopup").css({"visibility":"visible","display":"block"});
}


/*function getdate()
{
   var date = $("#datepicker").datepicker('getDate');
        $("#startdate").text(date);
}*/

function teamGetdatespan()
{
  var teamFullDate = $("#teamDatepicker").datepicker("option", "dateFormat", "d MM yy").val();
        $("#teamStartdatespan").text(teamFullDate);
    
}
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var teamDaynum1  =   $(this).text();
    var teamMonth1   =   $('.ui-datepicker-month').text();
    var teamYear1    =   $('.ui-datepicker-year').text();

   var teamMyDate = teamDaynum1 + " " + teamMonth1 + " " + teamYear1;
    $('#teamHeadingcontent').html(teamMyDate);

   $.ajax({
    url: "teamEvents.php",
    cache: false,
    type: "POST",
        data: {teamMyDate: teamMyDate},
        dataType: "html",
        success: function(html){
    $("#teamEventcontent").empty();  
    $("#teamEventcontent").append(html);
  }
    });
    
});
   

    
    
    
    
    
    
    
    
    
    
    