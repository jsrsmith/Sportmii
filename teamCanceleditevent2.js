$(document).ready(function()
{
 $('#teamCanceleditevent2').click(function(){
  teamRemoveeditpopup();
 });

});

function teamRemoveeditpopup()
{
 $("#teamEditeventspopup").fadeOut();
 $("#teamEditeventspopup").css({"visibility":"hidden","display":"none"});
}