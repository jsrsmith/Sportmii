$(document).ready(function()
{
 $('#clubCanceladdevent').click(function(){
  clubRemovepopup();
 });

});

function clubRemovepopup()
{
 $("#clubEventspopup").fadeOut();
 $("#clubEventspopup").css({"visibility":"hidden","display":"none"});
}