$(document).ready(function () {
  $('#clubEventsform').on('submit', function(e){
      
    if 
        ($.trim($("input[name=clubTitle]").val()) === "" || $.trim($("input[name=clubDestination]").val()) === "" || $.trim($("input[name=clubMeetingpoint]").val()) === "" || $.trim($("#clubEventhour").val()) == "" || $.trim($("#clubEventminute").val()) == "" || $.trim($("#clubMeethour").val()) == "" || $.trim($("#clubMeetminute").val()) == "")
    { 
        clubShowwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function clubShowwarning()
{
 $("#clubNotfilledin").css({"visibility":"visible"});
}
