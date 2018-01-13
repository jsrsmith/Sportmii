$(document).ready(function()
{
 $('#canceladdevent').click(function(){
  removepopup();
 });

});

function removepopup()
{
 $("#eventspopup").fadeOut();
 $("#eventspopup").css({"visibility":"hidden","display":"none"});
}