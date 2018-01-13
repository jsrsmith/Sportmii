$(document).ready(function()
{
 $('#clubCancelControl').click(function(){
  removeclubControlPopup();
 });

});

function removeclubControlPopup()
{
 $("#clubControlPopup").fadeOut();
 $("#clubControlPopup").css({"visibility":"hidden","display":"none"});
}