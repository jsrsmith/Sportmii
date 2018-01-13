$(document).ready(function()
{
 $(".contactDetails").click(function(){
  showClubContactDetailsPopup()
 });
});

function showClubContactDetailsPopup()
{
 $(".clubContactDetailsPopup").fadeIn();
 $(".clubContactDetailsPopup").css({"visibility":"visible","display":"block"});
}