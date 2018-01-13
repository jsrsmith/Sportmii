$(document).ready(function()
{
 $(".allDisciplineInfo").click(function(){
  teamDisciplineShowPopup();
 });
});

function teamDisciplineShowPopup()
{
 $("#teamDisciplinePopup").fadeIn();
 $("#teamDisciplinePopup").css({"visibility":"visible","display":"block"});
}
