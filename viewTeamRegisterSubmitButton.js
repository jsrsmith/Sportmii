$(document).ready(function () {
  $('#viewTeamRegisterForm').on('submit', function(e){
      
    if 
        ($.trim($("input[name=viewTeamRegisterFirstname]").val()) === "" || $.trim($("input[name=viewTeamRegisterSurname]").val()) === "" || $.trim($("input[name=viewTeamRegisterAddressLine1]").val()) === "" || $.trim($("input[name=viewTeamRegisterAddressLine2]").val()) === "" || $.trim($("input[name=viewTeamRegisterAddressLine3]").val()) === "" || $.trim($("input[name=viewTeamRegisterPostCode]").val()) === "")
    { 
        showViewTeamRegisterPlayerWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
          
      else
    {
        return true;
    }
});    
});


    function showViewTeamRegisterPlayerWarning()
{
 $("#viewTeamRegisterPlayerNotFilledIn").css({"visibility":"visible"});
}

 function showCreateTeamContactNumberWarning()
{
 $("#viewTeamRegisterPlayerNotFilledIn").css({"visibility":"visible"});
}