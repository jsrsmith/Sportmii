$(document).ready(function()
{
 $('#canceleditevent').click(function(){
  removeeditpopup();
 });

});

function removeeditpopup()
{
 $("#editeventspopup").fadeOut();
 $("#editeventspopup").css({"visibility":"hidden","display":"none"});
}