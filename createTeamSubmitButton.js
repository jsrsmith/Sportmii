$(document).ready(function () {
  $('#createTeamFootball').on('submit', function(e){
      
    if 
        ($.trim($("input[name=createTeamTeamName]").val()) === "" || $.trim($("input[name=createTeamAddressLine1]").val()) === "" || $.trim($("input[name=createTeamAddressLine2]").val()) === "" || $.trim($("input[name=createTeamAddressLine3]").val()) === "" || $.trim($("input[name=createTeamPostCode]").val()) === "" || $.trim($("input[name=createTeamManagersFirstname]").val()) === "" || $.trim($("input[name=createTeamManagersSurname]").val()) === "" || $.trim($("input[name=createTeamManagersContactNumber]").val()) === "" || $.trim($("input[name=createTeamManagersEmail]").val()) === "")
    { 
        showCreateTeamFilledInWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      
      else if
        
            ($.isNumeric($("input[name=createTeamManagersContactNumber]").val()) === false) {
                  showCreateTeamContactNumberWarning();
        return false;
            }
          
      else
    {
        return true;
    }
});    
});


    function showCreateTeamFilledInWarning()
{
 $("#createTeamNotFilledIn").css({"visibility":"visible"});
}

 function showCreateTeamContactNumberWarning()
{
 $("#createTeamContactNumber").css({"visibility":"visible"});
}