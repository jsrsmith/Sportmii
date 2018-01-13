$(document).ready(function () {
  $('#teamEditeventsform2').on('submit', function(e){
      
    if 
        ($.trim($("input[name=teamEdittitle]").val()) === "" || $.trim($("input[name=teamEditdestination]").val()) === "" || $.trim($("input[name=teamEditmeetingpoint]").val()) === "" || $.trim($("#teamEditeventhour").val()) == "" || $.trim($("#teamEditeventminute").val()) == "" || $.trim($("#teamEditmeethour").val()) == "" || $.trim($("#teamEditmeetminute").val()) == "" || $.trim($("#teamEditstartday").val()) == "" || $.trim($("#teamEditstartmonth").val()) == "" || $.trim($("#teamEditstartyear").val()) == "")
    { 
        teamShoweditwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function teamShoweditwarning()
{
 $("#teamEditeventnotfilledin").css({"visibility":"visible"});
}