$(document).ready(function()
{
 $('#clubCanceleditevent').click(function(){
  clubRemoveeditpopup();
 });

});

function clubRemoveeditpopup()
{
 $("#clubEditeventspopup").fadeOut();
 $("#clubEditeventspopup").css({"visibility":"hidden","display":"none"});
}