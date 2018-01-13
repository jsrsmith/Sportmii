$(document).ready(function () {
  $('#createClubFootball').on('submit', function(e){
      
    if 
        ($.trim($("input[name=createClubClubName]").val()) === "" || $.trim($("input[name=createClubAddressLine1]").val()) === "" || $.trim($("input[name=createClubAddressLine2]").val()) === "" || $.trim($("input[name=createClubAddressLine3]").val()) === "" || $.trim($("input[name=createClubPostCode]").val()) === "" || $.trim($("input[name=createClubChairmansFirstname]").val()) === "" || $.trim($("input[name=createClubChairmansSurname]").val()) === "" || $.trim($("input[name=createClubChairmansContactNumber]").val()) === "" || $.trim($("input[name=createClubChairmansEmail]").val()) === "" || $.trim($("input[name=createClubSecretaryFirstname]").val()) === "" || $.trim($("input[name=createClubSecretarySurname]").val()) === "" || $.trim($("input[name=createClubSecretaryContactNumber]").val()) === "" || $.trim($("input[name=createClubSecretaryEmail]").val()) === "" || $.trim($("input[name=createClubTreasurersFirstname]").val()) === "" || $.trim($("input[name=createClubTreasurersSurname]").val()) === "" || $.trim($("input[name=createClubTreasurersContactNumber]").val()) === "" || $.trim($("input[name=createClubTreasurersEmail]").val()) === "" || $.trim($("input[name=createClubWelfareOfficersFirstname]").val()) === "" || $.trim($("input[name=createClubWelfareOfficersSurname]").val()) === "" || $.trim($("input[name=createClubWelfareOfficersContactNumber]").val()) === "" || $.trim($("input[name=createClubWelfareOfficersEmail]").val()) === "")
    { 
        showCreateClubFilledInWarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      
      else if
        
            ($.isNumeric($("input[name=createClubChairmansContactNumber]").val()) === false || $.isNumeric($("input[name=createClubSecretaryContactNumber]").val()) === false || $.isNumeric($("input[name=createClubTreasurersContactNumber]").val()) === false || $.isNumeric($("input[name=createClubWelfareOfficersContactNumber]").val()) === false) {
                  showCreateClubContactNumberWarning();
        return false;
            }
          
      else
    {
        return true;
    }
});    
});


    function showCreateClubFilledInWarning()
{
 $("#createClubNotFilledIn").css({"visibility":"visible"});
}

 function showCreateClubContactNumberWarning()
{
 $("#createClubContactNumber").css({"visibility":"visible"});
}