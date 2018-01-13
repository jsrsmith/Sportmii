$(document).ready(function()
{
 $(".cancel").click(function(){
  teamContactDetailsRemovePopup();
 });

});

function teamContactDetailsRemovePopup()
{
 $(".teamContactDetailsPopup").fadeOut();
 $(".teamContactDetailsPopup").css({"visibility":"hidden","display":"none"});
}