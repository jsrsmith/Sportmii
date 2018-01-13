$(document).ready(function()
{
 $("#allClubDetails").click(function(){
  clubDetailsShowPopup();
 });
});

function clubDetailsShowPopup()
{
 $("#clubDetailsPopup").fadeIn();
 $("#clubDetailsPopup").css({"visibility":"visible","display":"block"});
}
