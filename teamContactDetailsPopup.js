$(document).ready(function()
{
 $(".contactDetails").click(function(){
  showContactDetailsPopup()
 });
});

function showContactDetailsPopup()
{
 $(".teamContactDetailsPopup").fadeIn();
 $(".teamContactDetailsPopup").css({"visibility":"visible","display":"block"});
}