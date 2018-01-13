$(document).ready(function () {
  $('#clubEditeventsform2').on('submit', function(e){
      
    if 
        ($.trim($("input[name=clubEdittitle]").val()) === "" || $.trim($("input[name=clubEditdestination]").val()) === "" || $.trim($("input[name=clubEditmeetingpoint]").val()) === "" || $.trim($("#clubEditeventhour").val()) == "" || $.trim($("#clubEditeventminute").val()) == "" || $.trim($("#clubEditmeethour").val()) == "" || $.trim($("#clubEditmeetminute").val()) == "" || $.trim($("#clubEditstartday").val()) == "" || $.trim($("#clubEditstartmonth").val()) == "" || $.trim($("#clubEditstartyear").val()) == "")
    { 
        clubShoweditwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function clubShoweditwarning()
{
 $("#clubEditeventnotfilledin").css({"visibility":"visible"});
}