$(document).ready(function()
{
 $('#fixturesResultsEditEditFixtureForm').on('submit', function (e) {  
    e.preventDefault();
    loadEditFixture();
 });

});

function loadEditFixture()
{
  var fixtureID = $("#fixturesResultsEditEditFixtureDropdown").val();
    
 $.ajax({
  url: "fixturesResultsEditFixtureID.php",
  cache: false,
    type: "POST",
     data: {fixtureID: fixtureID},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsEditEditFixturePopup").empty();  
    $("#fixturesResultsEditEditFixturePopup").append(html);
  }
});
}


$(document).ready(function()
{
 $('#fixturesResultsEditAddResultForm').on('submit', function (e) {  
    e.preventDefault();
    loadAddResult();
 });

});

function loadAddResult()
{
  var fixtureIDResult = $("#fixturesResultsEditAddResultDropdown").val();
    
 $.ajax({
  url: "fixturesResultsEditAddResult.php",
  cache: false,
    type: "POST",
     data: {fixtureIDResult: fixtureIDResult},
     dataType: "html",
  success: function(html){
    $("#fixturesResultsEditAddResultPopup").empty();  
    $("#fixturesResultsEditAddResultPopup").append(html);
  }
});
}