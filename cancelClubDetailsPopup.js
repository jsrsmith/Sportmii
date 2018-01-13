$(document).ready(function()
{
 $(":button").click(function(){
  clubDetailsRemovePopup();
 });

});

function clubDetailsRemovePopup()
{
 $("#clubDetailsPopup").fadeOut();
 $("#clubDetailsPopup").css({"visibility":"hidden","display":"none"});
}