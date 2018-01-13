$(document).ready(function()
{
 $('#canceleditevent2').click(function(){
  removeeditpopup();
 });

});

function removeeditpopup()
{
 $("#editeventspopup").fadeOut();
 $("#editeventspopup").css({"visibility":"hidden","display":"none"});
}