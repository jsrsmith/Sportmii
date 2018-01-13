$(document).ready(function () {
  $('#clubDetailsForm').on('submit', function(e){
      
    if 
        ($.trim($("input[name=editClubDetailsClubNameText]").val()) === "")
    { 
        clubDetailsShowWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function clubDetailsShowWarning()
{
 $("#clubNameNotFilledIn").css({"visibility":"visible"});
}
