$(document).ready(function () {
  $('#teamRegisterForm').on('submit', function(e){
      
    if 
        ($.trim($("input[name=teamRegisterFirstname]").val()) === "" || $.trim($("input[name=teamRegisterSurname]").val()) === "" || $.trim($("input[name=teamRegisterAddressLine1]").val()) === "" || $.trim($("input[name=teamRegisterAddressLine2]").val()) === "" || $.trim($("input[name=teamRegisterAddressLine3]").val()) === "" || $.trim($("input[name=teamRegisterPostCode]").val()) === "")
    { 
        showTeamRegisterPlayerWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
          
      else
    {
        return true;
    }
});    
});


    function showTeamRegisterPlayerWarning()
{
 $("#teamRegisterPlayerNotFilledIn").css({"visibility":"visible"});
}