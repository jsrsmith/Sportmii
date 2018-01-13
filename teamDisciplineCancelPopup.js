$(document).ready(function()
{
 $(".cancel").click(function(){
  teamDisciplineRemovePopup();
 });

});

function teamDisciplineRemovePopup()
{
 $("#teamDisciplinePopup").fadeOut();
 $("#teamDisciplinePopup").css({"visibility":"hidden","display":"none"});
}