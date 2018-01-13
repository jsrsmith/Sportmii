$(document).ready(function()
{
 $('#cancelFixturesResultsEditAddFixture').click(function(){
  removeAddFixturePopup();
 });

});

function removeAddFixturePopup()
{
 $("#fixturesResultsEditAddFixturePopup").fadeOut();
 $("#fixturesResultsEditAddFixturePopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelFixturesResultsEditRemoveFixture').click(function(){
  removeRemoveFixturePopup();
 });

});

function removeRemoveFixturePopup()
{
 $("#fixturesResultsEditRemoveFixturePopup").fadeOut();
 $("#fixturesResultsEditRemoveFixturePopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelFixturesResultsEditEditFixture').click(function(){
  removeEditFixturePopup();
 });

});

function removeEditFixturePopup()
{
 $("#fixturesResultsEditEditFixturePopup").fadeOut();
 $("#fixturesResultsEditEditFixturePopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelFixturesResultsEditFixtureIDAddFixture').click(function(){
  removeEditFixtureIDPopup();
 });

});

function removeEditFixtureIDPopup()
{
window.location.href = "fixturesResultsEdit.php";
}

$(document).ready(function()
{
 $('#cancelFixturesResultsEditAddResult').click(function(){
  removeAddResultPopup();
 });

});

function removeAddResultPopup()
{
 $("#fixturesResultsEditAddResultPopup").fadeOut();
 $("#fixturesResultsEditAddResultPopup").css({"visibility":"hidden","display":"none"});
}

$(document).ready(function()
{
 $('#cancelFixturesResultsEditEnterResult').click(function(){
  removeEnterResultPopup();
 });

});

function removeEnterResultPopup()
{
window.location.href = "fixturesResultsEdit.php";
}