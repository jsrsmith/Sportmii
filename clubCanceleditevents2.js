$(document).ready(function()
{
 $('#clubCanceleditevent2').click(function(){
  clubRemoveeditpopup();
 });

});

function clubRemoveeditpopup()
{
 $("#clubEditeventspopup").fadeOut();
 $("#clubEditeventspopup").css({"visibility":"hidden","display":"none"});
}