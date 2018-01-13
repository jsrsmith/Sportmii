$(document).ready(function () {
  $('#teamEventsform').on('submit', function(e){
      
    if 
        ($.trim($("input[name=teamTitle]").val()) === "" || $.trim($("input[name=teamDestination]").val()) === "" || $.trim($("input[name=teamMeetingpoint]").val()) === "" || $.trim($("#teamEventhour").val()) == "" || $.trim($("#teamEventminute").val()) == "" || $.trim($("#teamMeethour").val()) == "" || $.trim($("#teamMeetminute").val()) == "")
    { 
        teamShowwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function teamShowwarning()
{
 $("#teamNotfilledin").css({"visibility":"visible"});
}
