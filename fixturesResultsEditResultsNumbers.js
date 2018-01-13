$(document).ready(function () {
  $('#fixturesResultsEditEnterResultForm').on('submit', function(e){
      
    if 
        ($.trim($("#fixturesResultsEditEnterResultHomeTeamScore").val()) === "" || $.trim($("#fixturesResultsEditEnterResultAwayTeamScore").val()) === "")
    { 
        showResultsCantBeEmpty();
        /*alert('you did not fill out one of the fields');*/
        return false;
    }
      
      else if  
            ($.isNumeric($("#fixturesResultsEditEnterResultHomeTeamScore").val()) === false || $.isNumeric($("#fixturesResultsEditEnterResultAwayTeamScore").val()) === false) {
                  showResultsNumbersOnly();
        return false;
            }
          
      else
    {
        return true;
    }
      
});    
});

function showResultsCantBeEmpty()
{
 $("#fixturesResultsNumbersEmpty").css({"visibility":"visible"});
}



    function showResultsNumbersOnly()
{
 $("#fixturesResultsNumbersOnlyWarning").css({"visibility":"visible"});
}
