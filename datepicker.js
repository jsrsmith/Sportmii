$(document).ready(function() { 
    
   //var event is brought in from json encode calendar.php
    
$('#datepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      beforeShowDay: highlightDays,
      onSelect: function(dateText, inst){
        showpopup();
        getdatespan();
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

function showpopup()
{
 $("#eventspopup").fadeIn();
 $("#eventspopup").css({"visibility":"visible","display":"block"});
}


/*function getdate()
{
   var date = $("#datepicker").datepicker('getDate');
        $("#startdate").text(date);
}*/

function getdatespan()
{
  var fullDate = $("#datepicker").datepicker("option", "dateFormat", "d MM yy").val();
        $("#startdatespan").text(fullDate);
    
}
});

$(document).on('mouseenter', '.ui-datepicker-calendar .ui-state-hover', function(e){

    var daynum1  =   $(this).text();
    var month1   =   $('.ui-datepicker-month').text();
    var year1    =   $('.ui-datepicker-year').text();

   var myDate = daynum1 + " " + month1 + " " + year1;
    $('#headingcontent').html(myDate);

   $.ajax({
    url: "events.php",
    cache: false,
    type: "POST",
        data: {myDate: myDate},
        dataType: "html",
        success: function(html){
    $("#eventcontent").empty();  
    $("#eventcontent").append(html);
  }
    });
    
});
   

    
    
    
    
    
    
    
    
    
    
    