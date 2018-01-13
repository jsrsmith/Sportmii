$(document).ready(function()
{
 $("#fixturesResultsEditAddFixtureDiv").click(function(){
  showAddFixturePopup();
 });
});

function showAddFixturePopup()
{
 $("#fixturesResultsEditAddFixturePopup").fadeIn();
 $("#fixturesResultsEditAddFixturePopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $("#fixturesResultsEditRemoveFixtureDiv").click(function(){
  showRemoveFixturePopup();
 });
});

function showRemoveFixturePopup()
{
 $("#fixturesResultsEditRemoveFixturePopup").fadeIn();
 $("#fixturesResultsEditRemoveFixturePopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $("#fixturesResultsEditEditFixtureButton").click(function(){
  showEditFixturePopup();
 });
});

function showEditFixturePopup()
{
 $("#fixturesResultsEditEditFixturePopup").fadeIn();
 $("#fixturesResultsEditEditFixturePopup").css({"visibility":"visible","display":"block"});
}

$(document).ready(function()
{
 $("#fixturesResultsEditAddResultButton").click(function(){
  showAddResultPopup();
 });
});

function showAddResultPopup()
{
 $("#fixturesResultsEditAddResultPopup").fadeIn();
 $("#fixturesResultsEditAddResultPopup").css({"visibility":"visible","display":"block"});
}