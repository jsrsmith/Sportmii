$(document).ready(function()
{
 $(".cancel").click(function(){
  clubContactDetailsRemovePopup();
 });

});

function clubContactDetailsRemovePopup()
{
 $(".clubContactDetailsPopup").fadeOut();
 $(".clubContactDetailsPopup").css({"visibility":"hidden","display":"none"});
}