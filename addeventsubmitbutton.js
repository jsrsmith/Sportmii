$(document).ready(function () {
  $('#eventsform').on('submit', function(e){
      
    if 
        ($.trim($("input[name=title]").val()) === "" || $.trim($("input[name=destination]").val()) === "" || $.trim($("input[name=meetingpoint]").val()) === "" || $.trim($("#eventhour").val()) == "" || $.trim($("#eventminute").val()) == "" || $.trim($("#meethour").val()) == "" || $.trim($("#meetminute").val()) == "")
    { 
        showwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function showwarning()
{
 $("#notfilledin").css({"visibility":"visible"});
}
