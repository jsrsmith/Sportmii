$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#clubDatepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: clubHighlightDays,
      onSelect: function(dateText, inst){
        clubShowpopup();
        clubGetdatespan();
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

function clubShowpopup()
{
 $("#clubEventspopup").fadeIn();
 $("#clubEventspopup").css({"visibility":"visible","display":"block"});
}


/*function getdate()
{
   var date = $("#datepicker").datepicker('getDate');
        $("#startdate").text(date);
}*/

function clubGetdatespan()
{
  var clubFullDate = $("#clubDatepicker").datepicker("option", "dateFormat", "d MM yy").val();
        $("#clubStartdatespan").text(clubFullDate);
    
}
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var clubDaynum1  =   $(this).text();
    var clubMonth1   =   $('.ui-datepicker-month').text();
    var clubYear1    =   $('.ui-datepicker-year').text();

   var clubMyDate = clubDaynum1 + " " + clubMonth1 + " " + clubYear1;
    $('#clubHeadingcontent').html(clubMyDate);

   $.ajax({
    url: "clubEvents.php",
    cache: false,
    type: "POST",
        data: {clubMyDate: clubMyDate},
        dataType: "html",
        success: function(html){
    $("#clubEventcontent").empty();  
    $("#clubEventcontent").append(html);
  }
    });
    
});
   

    
    
    
    
    
    
    
    
    
    
    