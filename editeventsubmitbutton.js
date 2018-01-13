$(document).ready(function () {
  $('#editeventsform2').on('submit', function(e){
      
    if 
        ($.trim($("input[name=edittitle]").val()) === "" || $.trim($("input[name=editdestination]").val()) === "" || $.trim($("input[name=editmeetingpoint]").val()) === "" || $.trim($("#editeventhour").val()) == "" || $.trim($("#editeventminute").val()) == "" || $.trim($("#editmeethour").val()) == "" || $.trim($("#editmeetminute").val()) == "" || $.trim($("#editstartday").val()) == "" || $.trim($("#editstartmonth").val()) == "" || $.trim($("#editstartyear").val()) == "")
    { 
        showeditwarning();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      else
    {
        return true;
    }
});    
});

    function showeditwarning()
{
 $("#editeventnotfilledin").css({"visibility":"visible"});
}