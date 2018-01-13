$(document).ready(function()
{
 $("#leaguesCreateAddTeamsAddTeamDiv").click(function(){
  showAddTeamPopup();
 });
});

function showAddTeamPopup()
{
 $("#createAddTeamPopup").fadeIn();
 $("#createAddTeamPopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $("#leaguesCreateAddTeamsRemoveTeamDiv").click(function(){
  showRemoveTeamPopup();
 });
});

function showRemoveTeamPopup()
{
 $("#createRemoveTeamPopup").fadeIn();
 $("#createRemoveTeamPopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $("#leaguesCreateAddTeamsEditTableButton").click(function(){
  showEditTablePopup();
 });
});

function showEditTablePopup()
{
 $("#createEditTablePopup").fadeIn();
 $("#createEditTablePopup").css({"visibility":"visible","display":"block"});
}