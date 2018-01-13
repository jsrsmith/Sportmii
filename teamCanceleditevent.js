$(document).ready(function()
{
 $('#teamCanceleditevent').click(function(){
  teamRemoveeditpopup();
 });

});

function teamRemoveeditpopup()
{
 $("#teamEditeventspopup").fadeOut();
 $("#teamEditeventspopup").css({"visibility":"hidden","display":"none"});
}