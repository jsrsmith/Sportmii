$(document).ready(function()
{
 $('#cancelCreateAddTeam').click(function(){
  removeAddTeamPopup();
 });

});

function removeAddTeamPopup()
{
 $("#createAddTeamPopup").fadeOut();
 $("#createAddTeamPopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelCreateRemoveTeam').click(function(){
  removeRemoveTeamPopup();
 });

});

function removeRemoveTeamPopup()
{
 $("#createRemoveTeamPopup").fadeOut();
 $("#createRemoveTeamPopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelCreateEditTable').click(function(){
  removeEditTablePopup();
 });

});

function removeEditTablePopup()
{
 $("#createEditTablePopup").fadeOut();
 $("#createEditTablePopup").css({"visibility":"hidden","display":"none"});
}