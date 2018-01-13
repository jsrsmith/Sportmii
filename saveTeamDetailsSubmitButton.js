$(document).ready(function () {
  $('#teamDetailsForm').on('submit', function(e){
      
    if 
        ($.trim($("input[name=editTeamDetailsTeamNameText]").val()) === "")
    { 
        teamDetailsShowWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function teamDetailsShowWarning()
{
 $("#teamNameNotFilledIn").css({"visibility":"visible"});
}
